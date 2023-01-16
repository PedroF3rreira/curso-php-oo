<?php 
abstract class BaseRepository implements RepositoryInterface
{
	protected string $table;

	public function load(Criteria $criteria=null)
	{
		$sql = "SELECT * FROM {$this->table}";

		if($criteria)
		{
			$expression = $criteria->dump();

			if($expression)
			{
				$sql .= " WHERE {$expression}";
			}

			$order = $criteria->getProperty('order');
			$limit = $criteria->getProperty('limit');
			$offset = $criteria->getProperty('offset');

			if($order)
			{
				$sql .= "ORDER BY {$order}";
			}

			if($limit)
			{
				$sql .= "LIMIT {$limit}";
			}

			if($offset)
			{
				$sql .= "OFFSET {$offset}";
			}
		}

		if($conn = Transaction::get())
		{
			$result = $conn->query($sql);

			if($result)
			{
				$results = [];

				while($row = $result->fetchObject( ucfirst( str_replace('s', '', $this->table))) )
				{	
					$results[] = $row;
				}
			}
		}
		else
		{
			throw new Exception('Não têm uma transação aberta');
		}

		return $results;
	}

	public function delete(Criteria $criteria)
	{
		$sql = "DELETE FROM {$this->table} ";

		if($criteria)
		{
			$expression = $criteria;
			if($expression)
			{
				$sql .= " WHERE {$expression}";

				if($conn = Transaction::getConnection())
				{
					return$conn->exec($sql);
				}
				else
				{
					throw new Exception("Transação não está aberta");
				}
			}
			else
			{
				throw new Exception('É necessario um criterio para executar essa ação');
			}
		}
	}

	public function count(Criteria $criteria)
	{
	
	}

	public function create($data)
	{
		$class = ucfirst( str_replace('s', '', $this->table));
		
		$object = new  $class;

		foreach($data as $key => $value)
		{
			$object->$key = $value;
		}
		$object->store();
	}
}