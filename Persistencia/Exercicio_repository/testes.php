<?php 

require_once'classes/api/Connection.php';
require_once'classes/api/Transaction.php';
require_once'classes/api/Record.php';
require_once'classes/Evento.php';

try
{
	Transaction::open('evento');

	$evento = new Evento;
	$evento->nome = "marcas d'água";
	$evento->local = "rua 17 de novenbro n 254a";
	$evento->data = date('Y-m-d');
	$evento->inicio = date('h:i:s');
	$evento->fim = date('h:i:s');
	$evento->store();
	//var_dump($evento->load(1));

	Transaction::close();

}
catch(Exception $e)
{
	Transaction::rollback();
	echo "Erro : ".$e->getMessage();
}
