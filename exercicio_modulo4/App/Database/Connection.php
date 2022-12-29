<?php 

namespace App\Database;

class Connection
{
	private static $conn;

	public static function getConnection()
	{
		if(empty(self::$conn))
		{
			self::$conn = new \PDO('mysql:dbname=livro;host=localhost', 'root', '');
			self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		}

		return self::$conn;
	}
}