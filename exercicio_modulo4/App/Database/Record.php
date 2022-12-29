<?php 
namespace App\Database;


class Record
{
	protected $data;

	public function __get($prop)
	{
		return $this->data[$prop];
	}

	public function __set($prop, $value)
	{
		$this->data[$prop] = $value;
	}

	public function load()
	{
		$db = Connection::getConnection();
		$result = $db->query("SELECT * FROM " . $this::TABLENAME);

		return $result->fetchAll(\PDO::FETCH_ASSOC);
	}
}