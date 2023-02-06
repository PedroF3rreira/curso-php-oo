<?php 
namespace Livro\Database;
use Exception;

class Repository
{	
	private $model;
	
	public function __construct($class)
	{
		$this->model = $class;
	}

	public function load(Criteria $criteria)
	{	
		$sql = "SELECT * FROM {$this->getTableName()}";

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
				$sql .= " ORDER BY {$order} ";
			}

			if($limit)
			{
				$sql .= " LIMIT {$limit} ";
			}

			if($offset)
			{
				$sql .= " OFFSET {$offset} ";
			}
		}
		if($conn = Transaction::get())
		{
			$result = $conn->query($sql);

			if($result)
			{
				$results = [];

				while($row = $result->fetchObject($this->model))
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
		$sql = "DELETE FROM {$this->getTableName()}";

		if($criteria)
		{
			$expression = $criteria->dump();

			if($expression)
			{
				$sql .= " WHERE {$expression}";
			}
		}
		echo $sql;
		if($conn = Transaction::get())
		{
			return $result = $conn->exec($sql);
		}
		else
		{
			throw new Exception('Não têm transação aberta');
		}
	}

	public function count(Crieria $criteria)
	{
		$sql = "SELECT count(*) FROM {$this->getTableName()}";

		if($criteria)
		{
			$expression = $criteria->dump();

			if($expression)
			{
				$sql .= "WHERE {$expression}";
			}

		}

		if($conn = Transaction::get())
		{
			$result = $conn->query($sql);

			if($result)
			{
				$row = $result->fetch();
				return $row[0];
			}
		}
		else
		{
			throw new Exception("Não têm uma transação aberta");
		}
	}

	public function getTableName()
	{
		return strtolower($this->model);
	}
}