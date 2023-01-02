<?php 

class Connection
{

	private function __construct(){}

	public static function open( $name )
	{
		if(file_exists("config/{$name}.ini"))
		{
			$db = parse_ini_file("config/{$name}.ini");
		}
		else
		{
			throw new Exception("Arquivo {$name} não foi encontrado");
		}

		$host = isset($db['host'])?$db['host']:null;
		$dbname = isset($db['dbname'])?$db['dbname']:null;
		$user = isset($db['user'])?$db['user']:null;
		$password = isset($db['password'])?$db['password']:null;
		$type = isset($db['type'])?$db['type']:null;

		switch ($type) {
			case 'pgsql':
				$port = isset($db['port'])??'5432';
				$conn = new PDO('pgsql:dbname={$dbname}; user={$user}; password={$password}; host={$host}; port={$port}');
				break;
			case 'mysql':
				$port = isset($db['port'])??'3306';
				$conn = new PDO("mysql:dbname={$dbname};host={$host}", $user, $password);
				break;
			case 'sqlite':
				$conn = new PDO('sqlite:{$name}');
				break;
		}
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn
	}
}