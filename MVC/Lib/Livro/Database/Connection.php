<?php 
namespace Livro\Database;
use PDO;
use Exception;

class Connection
{
	private function __construct(){}

	public static function open( $filename )
	{
		if(file_exists('conf/'.$filename.'.ini'))
		{
			$db = parse_ini_file('conf/'.$filename.'.ini');
		}
		else
		{
			throw new Exception('Arquivo não existe');
		}

		$dbname 	= isset($db['dbname']) ? $db['dbname'] : null;
		$host 		= isset($db['host']) ? $db['host'] : null;
		$user 		= isset($db['user']) ? $db['user'] : null;
		$password 	= isset($db['password']) ? $db['password'] : null;
		$type 		= isset($db['type']) ? $db['type'] : null;

		switch($type)
		{
			case 'mysql':
				$port = isset($db['port']) ? $db['port'] : '3306';
				$conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
			break;

			case 'pgsql':
				$port = isset($db['port']) ? $db['port'] : '5432';
				$conn = new PDO("pgsql:host={$host};port={$port};dbname={$dbname};user={$user};password={$password}");
			break;

			case 'sqlite':
				$conn = new PDO("dbname={$dbname}");
			break;
		}

		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
}