<?php 
require 'classes/Fabricante.php';
require 'classes/Produto.php';

echo "Associação de objetos";

$produto = new Produto('Boneco astro', 20, 255);
var_dump($produto);

$fabricante = new Fabricante('matel', true);
var_dump($fabricante);


$produto->setFabricante($fabricante);

var_dump($produto);

echo "fabricante do produto {$produto->getFabricante()->getNome()}";