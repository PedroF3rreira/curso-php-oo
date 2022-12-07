<?php 

/**
 * 	
 */
class Pessoa
{
	protected $nome;//é acessecivel por sus classes e susas classes filhas
	protected $idade;

	function __construct(string $nome, int $idade)
	{
		$this->nome = $nome;
		$this->idade = $idade;
	}
}

class Aluno extends Pessoa
{
	private $sala;//é acessivel apenas em sua classe
	private $turno;

	function __construct($nome, $idade, $sala, $turno)
	{
		parent::__construct($nome, $idade);
		
		$this->sala = $sala;
		$this->turno = $turno;
	}
}

$aluno = new Aluno('Pedro Daniel', 29, '3A', 'noturno');

var_dump($aluno);