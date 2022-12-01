<?php 

require 'classes/Produto.php';
require 'classes/Cesta.php';

$p1 = new Produto('Cabo VGA 1mt', 20, 32.90);
$p2 = new Produto('ssd kingstone 500gb', 10, 222.90);

echo "<br>=======Objeto Produto========<br>";

var_dump($p1);

echo "<br>=======Adicionando Produtos a cesta========<br>";

$c = new Cesta();
$c->adicionarProduto($p1);
$c->adicionarProduto($p2);

var_dump($c);

echo "<br>=======excluindo cesta da memória========<br>";
unset($c);

echo "<br>=======Diferente da composição os objetos produtos continuam em memoria========<br>";
var_dump($p1);
var_dump($p2);
// $atributos = $p1->getAtributos();

// foreach($atributos as $atributo)
// {
// 	echo "Nome do atributo: {$atributo->getNome()}<br>";
// 	echo "Valor do atribito: {$atributo->getValor()}<br><br>";
// }
