<?php 
declare(strict_types=1);
$nomes = [
	'pedro',
	'karina',
	'moisés',
	'melissa'
];

foreach ($nomes as $nome) {
	echo  "<h1>{$nome}</h1>";
}

$a = 10;
$b = &$a;//passagem por referencia o $b vai aconpanhar o valor de $a

//todos os objetos sao atribuidos por referência ou seja variaveis apontam para o mesmo endereço na memória 

echo $a, $b;

$a = 25;

echo $b;
/**
 * saida 
 * 1ª 10 10
 * 
 * 2ª 25
 * 
 */


//tipagem de parâmetros e retorno de função
function imc(float $peso, float $altura):float
{
	return $peso / ($altura * $altura);
} 

var_dump(imc(85.9, 1.89));

echo"<br>";
var_dump($_SERVER);//INFORMAÇÕES DO SERVIDOR
//super globais
echo "<pre>";
	var_dump($_SERVER);//INFORMAÇÕES DO SERVIDOR
	var_dump($_GET);//DADOS QUERY STRING
	var_dump($_POST);//APENAS DADOS POST FORMULARIOS
	var_dump($_REQUEST);//PEGA GET OU POST
echo"</pre>";