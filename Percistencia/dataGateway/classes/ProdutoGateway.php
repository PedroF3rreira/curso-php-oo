<?php 

class ProdutoGateway
{
	private static $conn;

	public function find($id, $class = 'stdClass')
	{
		$sql = "SELECT * FROM produtos WHERE id = $id";
		$result = self::$conn->query($sql);
		return $result->fetchObject( $class );
	}

	public function all($filter = '', $class = 'stdClass')
	{
		$sql = "SELECT *  FROM produtos";

		if($filter)
		{
			$sql .= " WHERE ".$filter;
		}
		print $sql."<br>";
		$result = self::$conn->query($sql);
		return $result->fetchAll( PDO::FETCH_CLASS, $class );
	}

	public function delete($id)
	{
		$sql = "DELETE FROM produtos WHERE id = $id";
		print $sql.'<br>';

		$result = self::$conn->query($sql);
		return $result;
	}

	public function save($data)
	{	
		if(empty($data->id))
		{
			$sql = "INSERT INTO produtos 
			(	descricao, 
				estoque, 
				preco_custo, 
				preco_venda, 
				codigo_barras, 
				data_cadastro, 
				origem
			) 
			VALUES
			(	'{$data->descricao}', 
				'{$data->estoque}', 
				'{$data->preco_custo}', 
				'{$data->preco_venda}', 
				'{$data->codigo_barras}', 
				'{$data->data_cadastro}', 
				'{$data->origem}'
			)";
		}
		else
		{
			$sql = "UPDATE produtos SET descricao = '{$data->descricao}', 
				estoque 		= '{$data->estoque}', 
				preco_custo		= '{$data->preco_custo}', 
				preco_venda 	= '{$data->preco_venda}', 
				codigo_barras 	= '{$data->codigo_barras}', 
				data_cadastro 	= '{$data->data_cadastro}', 
				origem 			= '{$data->origem}'
				WHERE id = $data->id";
		}
		print $sql."<br>";
		return self::$conn->exec($sql);
	}

	public static function setConnection(PDO $conn)
	{
		self::$conn = $conn;
	}
}