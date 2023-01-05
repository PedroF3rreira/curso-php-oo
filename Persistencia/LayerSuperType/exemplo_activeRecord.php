<?php 
require_once 'classes/Record.php';
require_once 'api/Logger.php';
require_once 'api/LoggerTXT.php';
require_once 'api/Connection.php';
require_once 'api/Transaction.php';
require_once 'classes/Produto.php';

try
{
	Transaction::open('estoque');
	Transaction::setLogger(new LoggerTXT('log.txt'));

	$p = new Produto(2);

	var_dump($p);

	var_dump($p->toJson());
	
	$p2 =  new Produto;
	$p2->descricao = "macarrao com ovo";
	$p2->estoque = 20;
	$p2->preco_custo = 12.9;
	$p2->preco_venda = 22.9;
	$p2->codigo_barras = "macarrao com ovo";
	$p2->data_cadastro = date('Y-m-d');
	$p2->origem = 'L';
	$p2->store();
	Transaction::close();
}
catch(Exception $e)
{	
	Transaction::rollback();
	echo $e->getMessage();
}