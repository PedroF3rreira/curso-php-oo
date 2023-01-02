<?php 

class Connection
{
	private static $instance;

	private function __construct()
	{
		
	}
	
	public static function getInstance()
	{
		if(empty(self::$instance))
		{
			self::$instance = new PDO('mysql:dbname=livro;host=localhost;', 'root', '');
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		return self::$instance;
	}
}