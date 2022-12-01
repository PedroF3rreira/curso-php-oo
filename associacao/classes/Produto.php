<?php 

class Produto {

	protected string $descricao;
	protected int $estoque;
	protected float $preco;
	private Fabricante $fabricante;//associação aponta para um outro objeto

	public function __construct(string $descricao, int $estoque, float $preco)
	{
		$this->setDescricao($descricao);
		$this->setPreco($preco);
		$this->setEstoque($estoque);
	}

	/**
	 * OBJETO SE UTILIZANDO DE OUTRO PARA REALIZAR UMA OPERAÇÃO SEM QUE AJA DEPENDENCIA DELE
	 * POIS PODE OU NAO TER A INFORMAÇÃO DO FABRICANTE
	 */
	public function setFabricante(Fabricante $fabricante)
	{
		$this->fabricante = $fabricante;
	}

	public function getFabricante()
	{
		return $this->fabricante;
	}

	public function aumentarEstoque(int $unidades) : void
	{
		if(is_numeric($unidades) && $unidades >= 0)
		{
			$this->estoque += $unidades;
		}
		
	}

	public function diminuirEstoque(int $unidades) : void
	{
		if(is_numeric($unidades) && $unidades >= 0 )
		{
			$this->estoque += $unidades;
		}
	}

	public function ajustarPreco(float $percentual) : void
	{
		if(is_numeric($percentual) && $percentual >= 0)
		{
			$this->preco *= (1 + ($percentual / 100 ));
		}
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function setDescricao(string $descricao)
	{
		return $this->descricao = $descricao;
	}

	public function getestoque()
	{
		return $this->estoque;
	}

	public function setEstoque(int $estoque)
	{
		return $this->estoque = $estoque;
	}

	public function getPreco()
	{
		return $this->preco;
	}

	public function setPreco(float $preco)
	{
		return $this->preco = $preco;
	}
}