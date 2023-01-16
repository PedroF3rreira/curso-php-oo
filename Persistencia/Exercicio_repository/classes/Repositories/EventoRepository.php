<?php 
class EventoRepository implements EventoInterface
{
	public function load(Criteria $criteria=null)
	{
		$sql = "SELECT * FROM eventos";

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

				while($row = $result->fetchObject('Evento'))
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
	
	}

	public function count(Criteria $criteria)
	{
	
	}

	public function create()
	{
		$evento = new Evento;
		$evento->name = 'tatata';
		return $evento->store();
	}
}