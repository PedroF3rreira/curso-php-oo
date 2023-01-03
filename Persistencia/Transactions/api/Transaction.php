<?php

/**
 * classe de transação utilizada para garantir a integridade dos dados no banco
 * com essa tecnica os pacotes de dados só são gravados se todos os dados passados pelo
 * aplicativo forem gravados no banco de forma correta caso contrario a transação executa
 * o rollback deixando o banco do jeito que era antes das linha afetadas assim não per
 * mitindo gravação de dados incompletos
 */
class Transaction
{
	private static $conn;

	private function __construct(){}

	public static function open( $database )
	{
		self::$conn = Connection::open( $database );
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

	public static function get()
	{
		return self::$conn;
	}

	public function rollback()
	{
		if(self::$conn)
		{
			self::$conn->rollback();
			self::$conn = null;
		}
	}
}