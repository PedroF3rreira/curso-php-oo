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

	$cri = new Criteria;

	$repo = new Repository('Produto');
	
	$produtos = $repo->load($cri);

	foreach($produtos as $produto)
	{
		echo "Descrição: ".$produto->descricao."<br>";
		echo "Preço venda: ".$produto->preco_venda."<br>";

		echo "<br><br>";
	}
	
	echo $repo->count($cri);

	//linha deleta registro de acordo com o criterio definido
	// $cri->add('id', '=', 3);
	// echo $repo->delete($cri);

	Transaction::close();
}
catch(Exception $e)
{	
	Transaction::rollback();
	echo $e->getMessage();
}
