<?php 

class Funcionario 
{
	public string $nome;
	private float $salario;

	public function getNome()
	{
		return $this->nome;
	}
	public function setNome($nome)
	{
		$this->nome = $nome;
	}
	public function getSalario()
	{
		return $this->salario;
	}
	public function setSalario($salario)
	{
		$this->salario = $salario;
	}
}

class Estagiario extends Funcionario
{
	private $bolsa;
}


echo"<br>Método retorna um array com os métodos existentes na classe passado como parâmetro<br>";
 
var_dump(get_class_methods('Funcionario'));

$f1 = new Funcionario;
$f1->nome = "Pedro";
$f1->setSalario(122.69);

$e = new Estagiario;
$e->nome = 'Moises';
$e->setSalario(1000.65);

echo"<br>método retorna os atributos da classe que são definidos diretamente<br>";
var_dump(get_object_vars($f1));

echo"<br>Método recebe um objeto e retorna nome da classe que ele instancia<br>";
var_dump(get_class($f1));
var_dump(get_class($e));

echo"<br>Método recebe um objeto ou uma classe é retorna suas classes parentes<br>";
var_dump(get_parent_class('Estagiario'));
var_dump(get_parent_class($e));

echo"<br>Método recebe um objeto e o nome de uma classe e testa se o objeto é subclasse da classe passada<br>";
var_dump(is_subclass_of($e, 'Funcionario'));
var_dump(is_subclass_of('Estagiario', 'Funcionario'));

echo"<br>Método testa se o objeto contem o método passado<br>";

var_dump(method_exists($f1, 'getNome'));
var_dump(method_exists($f1, 'getValor'));

echo "Função executa a função passado como 1º parâmetro";

function apresenta( $nome )
{
	echo "<br>{$nome}<br>";
}

$funcao = 'apresenta';

call_user_func($funcao, 'Pedro Daniel');

echo "<br>Função executa o método passado no 2º parâmetro método do objeto ou classe passado no 1º parâmetro<br>";

echo "Método executado ".call_user_func([$f1, 'getNome']);