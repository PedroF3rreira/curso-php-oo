<?php
/**
 * classe Record é uma super classe utilizada para fazer a manipulação de dados
 * com o banco de dados criada de forma gênerica para que as entidades do sistema 
 * possam extendela e implementar suas propias regras de negócio
 * **/
abstract class Record
{
	private array $data;

	/**
	 * método construtor esta sendo usado para executar métodos 
	 * da propia classe fazendo a busca no banco de dados pelo
	 * id passado caso seja passado
	 * **/
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
 			return $this->data[$prop];
 		}
 	}

	public function __isset($prop)
	{
		return isset($this->data[$prop]);
	}

	public function __clone()
	{
		if(isset($this->data['id']))
		{
			unset($this->data['id']);
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

	public function toJson()
	{
		return json_encode($this->data);
	}

	public function fromJson($data)
	{
		if(isset($this->data))
		{
			return $this->data = json_decode($data);
		}
	}
	
	/**
	 * pega valor da constante da classe filha 
	 * atraves do objeto ativo na memoria que esta utilizando
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
		if( empty($this->data['id']) || (!$this->load($this->data['id'])) )  
		{
			$sql = "INSERT INTO " . $this->getEntity() . '('.implode(',', array_keys($this->data)) .')' 
			." VALUES (:descricao, :estoque, :preco_custo, :preco_venda, :codigo_barras, :data_cadastro, :origem)";

		}
		else
		{
			$sql = "UPDATE " .$this->getEntity() . " SET 
			
				descricao = :descricao,
				estoque = :estoque,
				preco_custo = :preco_custo,
				preco_venda = :preco_venda,
				codigo_barras = :codigo_barras,
				data_cadastro = :data_cadastro,
				origem = :origem
				WHERE id = ".$this->data['id'];
		}
		
		if($conn = Transaction::get())
		{
			$result = $conn->prepare($sql);
			Transaction::log($sql);
			return $result->execute([
				'descricao' 	=> $this->descricao,
				'estoque' 		=> $this->estoque,
				'preco_custo' 	=> $this->preco_custo,
				'preco_venda' 	=> $this->preco_venda,
				'codigo_barras' => $this->codigo_barras,
				'data_cadastro' => $this->data_cadastro,
				'origem' 		=> $this->origem,
			]);			
		}
		else
		{
			throw new Exception('Não há transação ativa');
		} 
	}

	public function delete()
	{
		
		if($conn = Transaction::get())
		{
			Transaction::log($sql);

			$result = $conn->prepare($sql);
			
		}
		else
		{
			throw new Exception('Não há transação ativa');
		} 
	}
}