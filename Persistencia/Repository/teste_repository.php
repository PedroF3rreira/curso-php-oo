<?php 
require_once 'classes/api/Connection.php';
require_once 'classes/api/Transaction.php';
require_once 'classes/api/Record.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerTXT.php';
require_once 'classes/api/Criteria.php';
require_once 'classes/api/Repository.php';
require_once 'classes/Produto.php';

try{
	Transaction::open('estoque');

	$cri = new Criteria;
	$cri->add('preco_venda', '>', 900);
	$cri->add('preco_custo', '>', 1);

	$repo = new Repository('Produto');
	
	$produtos = $repo->load($cri);

	Transaction::close();
}
catch(Exception $e)
{	
	Transaction::rollback();
	echo $e->getMessage();
}
