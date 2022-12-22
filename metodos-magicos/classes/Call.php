<?php 

class Titulo
{
	public $codigo, $nome, $valor;

	//método intercepta a chamada de metodos do objeto
	public function __call($method, $param)
	{
		echo "Você chamou o método ".$method." com os parâmetros ".implode( ' , ', $param);
	}
}

$t = new Titulo;
$t->codigo = 10;
$t->nome = "Elias";
$t->valor = 120;

//chamando um método que não existe na no objeto 
//o método call ira interceptar e executar o que você quiser
$t->print_r(1,3.8);