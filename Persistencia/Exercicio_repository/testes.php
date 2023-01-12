<?php 

require_once'classes/api/Connection.php';
require_once'classes/api/Transaction.php';
require_once'classes/api/Record.php';
require_once'classes/api/Criteria.php';
require_once 'classes/api/Repository.php';
require_once'classes/Evento.php';

try
{
	Transaction::open('evento');

	$criteria = new Criteria;
	$criteria->add('nome', 'like', '%n%');
	$criteria->add('nome', 'like', '%expo%', 'or');
	var_dump($criteria->dump());
	$repository = new Repository('Evento');
	$eventos = $repository->load($criteria);

	var_dump($eventos);
	$evento = new Evento;
	// $evento->nome = "Novo bob esponja";
	// $evento->local = "rua 17 de novenbro n 254a";
	// $evento->data = date('Y-m-d');
	// $evento->inicio = date('h:i:s');
	// $evento->fim = date('h:i:s');
	// $evento->store();
	//$e = $evento->load(2);
	//$e->delete();
	// $e->nome = "Editado arroz babão de novo";
	// $e->store();
	Transaction::close();

}
catch(Exception $e)
{
	Transaction::rollback();
	echo "Erro : ".$e->getMessage();
}
