<?php 

class Repository
{
	private $activeRecord;
	
	public function __construct($class)
	{
		$this->activeRecord = $class;
	}

	public function load(Criteria $criteria)
	{
		$sql = "SELECT * FROM " . constant($this->activeRecord . '::TABLENAME');

		if($criteria)
		{
			$expression = $criteria->dump();

			if($expression)
			{
				$sql .= " WHERE ".$expression;
			}

			$order = $criteria->getProperty('order');
			$limit = $criteria->getProperty('limit');
			$offset = $criteria->getProperty('offset');

			if($order)
			{
				$sql .= " ORDER BY " . $order;
			}

			if($limit)
			{
				$sql .= " LIMIT " . $limit;
			}

			if($offset)
			{
				$sql .= " OFFSET " . $offset;
			}

			if($conn = Transaction::get())
			{
				$result = $conn->query($sql);
				
				$results = [];

				while($row = $result->fetchObject($this->activeRecord))
				{
					$results[] = $row;
				}
			}
			else
			{
				throw new Exception('transação não esta aberta');
			}

			return $results;
		}
	}

	public function delete($value='')
	{
		// code...
	}

	public function count($value='')
	{
		// code...
	}
}