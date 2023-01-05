<?php

abstract class Record
{
	private array $data;

	public function __construct($id = null)
	{
		if($id)
		{
			$object = $this->load($id);
			if($object)
			{
				$this->fromArray($object->toArray());
			}
		}
	}

	public function __set($prop, $value)
	{
		if($value === null)
		{
			unset($this->data[$prop]);
		}
		else
		{
			$this->data[$prop] = $value;
		}
 	}

 	public function __get($prop)
 	{
 		if(isset($this->data[$prop]))
 		{
 			return $this->date[$prop];
 		}
 	}


	public function __isset($prop)
	{
		return isset($this->data[$prop]);
	}

	public function __clone()
	{
		if(isset($this->data[$fieldId]))
		{
			unset($this->data[$fieldId]);
		}
	}

	/**
	 * método permite que o objeto seja populado atraves de um array
	 * muitas vezes vindo de um formulário
	 * @param  array  $data 
	 * @return array
	 */
	public function fromArray(array $data)
	{
		$this->data = $data;
	}

	public function toArray()
	{
		return $this->data;
	}

	/**
	 * pega valor da constante da classe filha 
	 * atraves do objeto ativo na memoria que eta utilizando
	 * os métodos do record
	 * @return string
	 */
	private function getEntity()
	{
		$class = get_class($this);

		return constant("{$class}::TABLENAME");
	}


	public function load($id)
	{
		$sql = "SELECT * FROM " . $this->getEntity() . " WHERE id = :id" ;

		if($conn = Transaction::get())
		{
			Transaction::log($sql);

			$result = $conn->prepare($sql);
			$result->execute(['id' => (int) $id]);

			if($result)
			{
				return $result->fetchObject( get_class($this) );
			}
			
		}
		else
		{
			throw new Exception('Não há transação ativa');
		} 
	}

	public function store()
	{
		
	}

	public function delete()
	{
		
	}
}