<?php 

class Produto
{
	private array $data;
	private static $conn;
	
	public static function setConnection(PDO $conn)
	{
		self::$conn = $conn;
	}

	public function __get($prop)
	{
		return $this->data[$prop];
	}

	public function __set($prop, $value)
	{
		$this->data[$prop] = $value;
	}

	public static function all($filter = '')
	{
		$sql = "SELECT * FROM produtos ";
		$prepare = null;

		if($filter)
		{
			$sql .= " WHERE descricao like :filter";
			
			$prepare = self::$conn->prepare($sql);

			$prepare->execute(['filter' => "%$filter%"]);

			return $prepare->fetchAll(PDO::FETCH_CLASS, __CLASS__);
		}

		$prepare = self::$conn->prepare($sql);
		$prepare->execute();

		return $prepare->fetchAll(PDO::FETCH_CLASS, __CLASS__);
	}

	public function find($id)
	{
		$sql = "SELECT * FROM produtos WHERE id = :id";
		$result = self::prepare($sql);
		$result->execute(['id' = $id]);

		return $result->fetchObject(__CLASS__);
	}
}