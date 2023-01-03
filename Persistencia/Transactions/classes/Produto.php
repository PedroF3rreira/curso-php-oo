<?php 
/**
 * classe padão active record
 * pros: com apenas um arquivo somos capazes de realizar um crud nas entidades do sistema
 * contras: feri o principio de responsabilidade unico do S.O.L.I a classe e responsavel por
 * representar um entidade e suas regras de negocio e tambêm por acessar banco de dados
 * **/
class Produto
{
	private array $data;
	
	public function __get($prop)
	{
		return $this->data[$prop];
	}

	public function __set($prop, $value)
	{
		$this->data[$prop] = $value;
	}

	public static function all($filter = '')
	{
		$sql = "SELECT * FROM produtos ";
		$prepare = null;
		$conn = Transaction::get();

		if($filter)
		{
			$sql .= " WHERE descricao like :filter";
		
			$prepare = $conn->prepare($sql);

			$prepare->execute(['filter' => "%$filter%"]);

			return $prepare->fetchAll(PDO::FETCH_CLASS, __CLASS__);
		}

		$prepare = $conn->prepare($sql);
		$prepare->execute();

		return $prepare->fetchAll(PDO::FETCH_CLASS, __CLASS__);
	}

	public static function find($id)
	{
		$sql = "SELECT * FROM produtos WHERE id = :id";
		
		$conn = Transaction::get();
		$result = $conn->prepare($sql);
		$result->execute(['id' => $id]);

		return $result->fetchObject(__CLASS__);
	}

	public function save()
	{	

		$conn = Transaction::get();

		if(!isset($this->data['id']))
		{
			$sql = "INSERT INTO produtos 
			(	
				descricao, 
				estoque, 
				preco_custo, 
				preco_venda, 
				codigo_barras, 
				data_cadastro, 
				origem
			) 
			VALUES
			(	
				:descricao, 
				:estoque, 
				:preco_custo, 
				:preco_venda, 
				:codigo_barras, 
				:data_cadastro, 
				:origem
			)";

			print $sql."<br>";

			$result = $conn->prepare($sql);
			
			return $result->execute([
				'descricao' => $this->descricao, 
				'estoque' => $this->estoque, 
				'preco_custo' => $this->preco_custo, 
				'preco_venda' => $this->preco_venda, 
				'codigo_barras' => $this->codigo_barras, 
				'data_cadastro' => $this->data_cadastro, 
				'origem' => $this->origem
			]);

			$this->setId($conn->lastInsertId());
		}
		else
		{
			echo $this->id;
			$sql = "UPDATE produtos SET 
				descricao 		= :descricao, 
				estoque 		= :estoque, 
				preco_custo		= :preco_custo, 
				preco_venda 	= :preco_venda, 
				codigo_barras 	= :codigo_barras, 
				data_cadastro 	= :data_cadastro, 
				origem 			= :origem
				WHERE id = $this->id";

				print $sql."<br>";
				$result = $conn->prepare($sql);

				return $result->execute([
				'descricao' 	=> $this->descricao, 
				'estoque' 		=> $this->estoque, 
				'preco_custo' 	=> $this->preco_custo, 
				'preco_venda' 	=> $this->preco_venda, 
				'codigo_barras' => $this->codigo_barras, 
				'data_cadastro' => $this->data_cadastro, 
				'origem' 		=> $this->origem
			]);

		}
	}

	public function delete()
	{
		$conn = Transaction::get();
		
		$result = $conn->prepare("DELETE FROM produtos WHERE id = :id");
		return $result->execute(['id' => $this->id]);
	}

	public function getMargemLucro()
	{
		return (($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
	}

	public function registrarCompra($custo, $quantidade)
	{
		$this->preco_custo = $custo;
		$this->estoque += $quantidade;
	}

	public function setId($id)
	{
		$this->data['id'] = $id;
	}
}