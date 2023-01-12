<?php 
namespace Livro\Database;
use Exception;

abstract class Record
{
	private $data;
	protected $table;

	public function __construct($id = null)
	{
		if($id)
		{
			$object = $this->load($id);

			if($object)
			{
				$this->fromArray($this->toArray($object));
			}
		}
	}

	public function __set($prop , $value)
	{
		if($value === null)
		{
			$this->data[$prop] = null;
		}

		$this->data[$prop] = $value;
	}

	public function __get($prop)
	{
		if(isset($this->data[$prop]))
		{
			return $this->data[$prop];
		}
	}

	public function __isset($prop)
	{
		return isset($this->data[$prop]);
	}

	public function __unset($prop)
	{
		if(isset($this->data[$prop]))
		{
			unset($this->data[$prop]);
		}
	}

	public function __clone()
	{
		if(isset($this->data['id']))
		{
			$this->data['id'] = null;
		}
	}

	public function fromArray($data)
	{
		$this->data = $data;
	}

	public function toArray()
	{
		return $this->data;
	}

	public function load($id)
	{
		$sql = "SELECT * FROM {$this->table} WHERE id = :id";
		
		if($conn = Transaction::get())
		{
			$result = $conn->prepare($sql);
			$result->execute(['id' => $id]);

			if($result)
			{
				return $result->fetchObject( get_class($this) );
			}
		}
		else
		{
			throw new Exception('não há transação aberta!');
		}
	}

	public function store()
	{
		if( empty($this->data['id']) || (!$this->load($this->data['id'])) )
		{
			$sql = "INSERT INTO {$this->table} (" . implode(' , ',array_keys($this->data)) .")
			VALUES (:". implode(', :', array_keys( $this->data)) .")";
		}
		else
		{
			$sql = "UPDATE {$this->table} SET " . $this->formatStringUpdate() . "WHERE id = :id";
		}

		if($conn = Transaction::get())
		{
			$stmt = $conn->prepare($sql);			
			return $result = $stmt->execute($this->data);
		}
	}

	public function delete($id = null)
	{
		$id = $id ? $id : $this->data['id'];

		$sql = "DELETE FROM {$this->table} WHERE id = :id";

		if($conn = Transaction::get())
		{
			$stmt = $conn->prepare($sql);
			$result = $stmt->execute(['id' => $id]);

			return $result;
		}
		else
		{
			throw new Exception('Não ha transação aberta');
		}
	}

	public static function find( $id )
	{	
		//retorna classe utilizada no momento
		$class = get_called_class();
		$obj = new $class;

		return $obj->load($id);
	}

	private function formatStringUpdate()
	{
		$stringFormat = '';
			
		foreach(array_keys($this->data) as $key => $value)
		{
			if($value !== 'id')
			{
				if(count($this->data) == $key + 1)
				{
					$stringFormat .= "{$value} = :{$value} ";
				}
				else
				{
					$stringFormat .= "{$value} = :{$value}, ";
				}
			}
		}

		return $stringFormat;
	}

}