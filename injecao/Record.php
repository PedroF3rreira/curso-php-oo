<?php 

class Record
{
	protected $data;

	public function __set($prop, $value)
	{
		$this->data[$prop] = $value;
	}

	public function __get($prop)
	{
		return $this->data[$prop];
	}

	public function save()
	{
		return "INSERT INTO ". $this::TABLENAME ." (".implode(' , ', array_keys($this->data)) . ") 
				VALUES ". "(" . implode(' , ', array_values($this->data)) . ")"; 
	}

	public function delete()
	{
		return "DELETE FROM " . $this::TABLENAME . "WHERE id = " . $this->id; 
	}

	public function load()
	{
		return "SELECT * FROM " . $this::TABLENAME;
	}
}
