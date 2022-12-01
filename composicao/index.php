<?php 

require 'classes/Produto.php';
require 'classes/Atributo.php';

$p1 = new Produto('Cabo VGA 1mt', 20, 32.90);

echo "<br>=======Objeto Produto========<br>";

var_dump($p1);

echo "<br>=======Objeto depois de adicionar atributos========<br>";

$p1->adicionarAtributo('cor', 'azul');
$p1->adicionarAtributo('cor', 'verde');
$p1->adicionarAtributo('tamanho', 'g');

var_dump($p1);

echo "<br>=======Executando método getAtributos========<br>";

$atributos = $p1->getAtributos();

foreach($atributos as $atributo)
{
	echo "Nome do atributo: {$atributo->getNome()}<br>";
	echo "Valor do atribito: {$atributo->getValor()}<br><br>";
}

echo "<br>=======Excluindo objeto produto========<br>";

unset($p1);
