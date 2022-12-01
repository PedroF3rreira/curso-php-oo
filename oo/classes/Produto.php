<?php
declare(strict_types=1);

class Produto {

	protected string $descricao;
	protected int $estoque;
	protected float $preco;

	public function __construct(string $descricao, int $estoque, float $preco)
	{
		$this->setDescricao($descricao);
		$this->setPreco($preco);
		$this->setEstoque($estoque);
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