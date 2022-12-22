<?php 

class Titulo
{
	public $codigo, $nome, $valor;

	//método define como as propiedades do objeto clonado vão ser definidas
	public function __clone()
	{
		$this->codigo = null;
	}
}

$titulo = new Titulo;
$titulo->codigo = 10;
$titulo->nome = 'Pedro';
$titulo->valor = 12.69;

//atribuindo um objeto a um variavel;
$titulo2 = $titulo;

//a variavel $titulo2 vai apontar para o mesmo local na mémoria de $titulo
//entao temos duas variaveis apontando para mesma referencia do objeto
$titulo->valor = 200;

//vai imprimir na tela o valor 200 pois a variavel $titulo2 aponta para a mesma referencia
echo "<br> valor da propiedade titulo2 vai ser igual ao valor de 	titulo ".$titulo2->valor;

//como evitar isso?
//usando o clone na atribuição da variavel assim fazendo uma copia do objeto não apontando para mesma referencia
$titulo2 = clone $titulo;

//agora sim temos um objeto com uma referencia diferente não sofrendo alteraçoes quando $titulo alterar
//algum calor
echo "<br>alterando valor de titulo para 500";
$titulo = 500;

//
echo "<br>imprimindo propiedade->valor da variavel titulo2 clone valor continua em 200: ".$titulo2->valor;

