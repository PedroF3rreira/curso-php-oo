<?php 	
require_once 'classes/Produto.php';
require_once 'classes/Connection.php';

Produto::setConnection(Connection::getInstance());
var_dump(Produto::all());
$p1 = new Produto;
$p1->descricao = 'garrafa termica';
$p1->estoque = 20;
$p1->preco_custo = 15.69;
$p1->preco_venda = 25.69;
$p1->codigo_barras = '151665165165165165165165165156';
$p1->data_cadastro = date('Y-m-d');
$p1->origem = 'N';
//$p1->save();

$p2 = Produto::find(2);
$p2->descricao = 'Editado hoje';
$p2->save();
var_dump($p2);
//$p2->delete();
