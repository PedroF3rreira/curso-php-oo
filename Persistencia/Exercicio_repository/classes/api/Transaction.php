<?php 

class Transaction
{
	private static $conn;

	private function __construct(){}

	public static function open( $dbname )
	{
		self::$conn = Connection::open($dbname);
		self::$conn->beginTransaction();	
	}

	public static function close()
	{
		if(self::$conn)
		{
			self::$conn->commit();
			self::$conn = null;
		}
	}

	public static function rollback()
	{
		if(self::$conn)
		{
			self::$conn->rollback();
			self::$conn = null;
		}
	}

	public static function get()
	{
		if(self::$conn)
		{
			return self::$conn;
		}
	}
}