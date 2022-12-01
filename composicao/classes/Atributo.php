<?php 

class Atributo
{
	private string $nome;
	private string $valor;

	public function __construct(string $nome, string $valor)
	{
		$this->nome = $nome;
		$this->valor = $valor;
	}

	public function getNome()
	{
		return $this->nome; 
	}

	public function getValor()
	{
		return $this->valor;
	}

	public function __destruct()
	{
		echo "<br>Objeto Atributo Tambem fui excluido porque objeto Produto não existe mais<br>";
	}
}