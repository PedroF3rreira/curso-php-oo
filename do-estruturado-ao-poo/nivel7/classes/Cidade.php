<?php 

class Cidade
{
	private static $pdo;
	
	public static function getConnection()
	{	
		if(empty(self::$pdo))
		{
			$db = parse_ini_file('config/config.ini');
			$name = $db['name'];
			$host = $db['host'];
			$user = $db['user'];
			$pass = $db['pass'];

			self::$pdo = new PDO("mysql:dbname={$name};host={$host}", $user, $pass);
			self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		return self::$pdo;
		
	}

	public static function all()
	{
		
		$pdo = self::getConnection();
		
		$result = $pdo->query("SELECT * FROM cidades");
		
		return $result->fetchAll(PDO::FETCH_ASSOC);
		
	}

	public static function getCidade($id)
	{
		
		$pdo = new PDO('mysql:dbname=livro;host=localhost', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$result = $pdo->query("SELECT * FROM cidades WHERE id = $id");

		$data = $result->fetchAll(PDO::FETCH_ASSOC);

		return $data;
	}
}