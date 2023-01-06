<?php 

abstract class ActiveRecord
{
	private array $content;
	protected $table = null;
	protected $idField = null;
	protected $logTimestanp;

	public function __construct()
	{
		if(!is_bool($this->logTimestanp))
		{
			$this->logTimestanp = true;
		}

		if($this->table == null)
		{
			$this->table = strtolower(get_class($this));
		}

		if($this->idField == null)
		{
			$this->idField = 'id';
		}

	}

	public function __get($prop)
	{
		if(in_array($prop, $this->content))
		{
			return $this->content[$prop];
		}
	}

	public function __set($prop, $value)
	{
		if($value == null)
		{
			unset($this->content[$prop]);
		}

		$this->content[$prop] = $value;
	}

	public function __isset($prop)
	{
		return isset($this->content[$prop]);
	}

	public function __unset($prop)
	{
		if(isset($this->content[$prop]))
		{
			unset($this->content[$prop]);
			return true;
		}

		return false;
	}

	public function __clone()
	{
		if(isset($this->idField))
		{
			unset($this->idField);
		}
	}

	public function toArray()
	{
		return $this->content;
	}

	public function fromArray(array $content)
	{
		$this->content = $content;
	}

	public function toJson()
	{
		return json_encode($this->content);
	}

	public function fromJson(array $content)
	{
		$this->content = json_decode($content);
	}

	private function format($value)
	{
		if(is_string($value) !empty($value))
		{
			return "'" . addcslashes($value) . "'";
		}
		else if(is_bool($value))
		{
			return $value ? true : false;
		}
		else if ($value !== '') 
		{
			return $value;
		}
		else
		{
			return null;
		}
	}

	private function convertContent()
	{
		$newContent = [];
		foreach($this->content as $key => $value)
		{
			if(is_scalar($value))
			{

			}
		}
	}

}