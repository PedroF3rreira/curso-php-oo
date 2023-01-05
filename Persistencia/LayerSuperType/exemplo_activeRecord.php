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

	$p = new Produto(1);

	var_dump($p);

	Transaction::close();
}
catch(Exception $e)
{	
	Transaction::rollback();
	echo $e->getMessage();
}