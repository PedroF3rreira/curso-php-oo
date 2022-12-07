<?php 

/**
 * 	
 */
class Servico implements OrcavelInterface
{
	private $preco;
	private $descricao;
	
	public function __construct($descricao, $preco)
	{
		$this->descricao = $descricao;
		$this->preco = $preco;
	}

	public function getPreco()
	{
		return $this->preco;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}
}