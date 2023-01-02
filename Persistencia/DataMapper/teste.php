<?php 

require_once'classes/Produto.php';
require_once'classes/Venda.php';
require_once'classes/VendaMapper.php';

try{

	$p1 = new Produto;
	$p1->id = 1;
	$p1->preco = 12.69;
	$p1->quantidade = 25;

	$p2 = new Produto;
	$p2->id = 2;
	$p2->preco = 15.69;
	$p2->quantidade = 10;

	$v = new Venda;
	$v->setId(1);
	$v->addItem(3, $p1);
	$v->addItem(10, $p2);

	$pdo = new PDO('mysql:dbname=livro;host=localhost', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	VendaMapper::setConnection($pdo);
	VendaMapper::save($v);
}
catch(Exception $e)
{
	echo $e->getMessage();
}
