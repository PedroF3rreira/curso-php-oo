<?php 
declare(strict_types=1);

require 'classes/Produto.php';

$produto = new Produto('Boneco do woody', 20, 169.89);


var_dump($produto);

$produto->aumentarEstoque(20);
$produto->ajustarPreco(20);

var_dump($produto);