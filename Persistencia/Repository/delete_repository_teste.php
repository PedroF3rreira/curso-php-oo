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
	Transaction::setLogger(new LoggerTXT('logs.txt'));

	$c = new Criteria;
	$c->add('preco_venda', '>=', 22);
	$c->add('origem', '=', 'L');

	$r = new Repository('produto');

	$produtos = $r->load($c);
	var_dump($produtos);
	if($produtos)
	{
		foreach($produtos as $produto)
		{
			
			$produto->delete();
		}
	}

	Transaction::close();
}
catch(Exception $e)
{	
	Transaction::rollback();
	echo $e->getMessage();
}
