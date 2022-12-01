<?php 

/**
 * 
 */
class Fabricante
{
	
	private string $nome;
	private bool $documento;

	function __construct(string $nome, bool $documento)
	{
		$this->nome = $nome;
		$this->documento = $documento;
	}

	public function getNome()
	{
		return ucfirst($this->nome);
	}
}