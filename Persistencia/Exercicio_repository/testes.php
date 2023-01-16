<?php 

require_once'classes/api/Connection.php';
require_once'classes/api/Transaction.php';
require_once'classes/api/Record.php';
require_once'classes/api/Criteria.php';
require_once 'classes/Contracts/RepositoryInterface.php';
require_once 'classes/Repositories/BaseRepository.php';
require_once 'classes/Contracts/EventoInterface.php';
require_once 'classes/Repositories/EventoRepository.php';
require_once'classes/Evento.php';

try
{
	Transaction::open('evento');

	$criteria = new Criteria;
	$criteria->add('nome', 'like', '%n%');
	$criteria->add('nome', 'like', '%expo%', 'or');
	$er = new EventoRepository();
	var_dump($er->load());
	
	$dados = ['nome' => 'teste do novo repository', 'inicio' => date('Y-m-d'), 'fim' => date('Y-m-d')];
	$er->create($dados);

	Transaction::close();

}
catch(Exception $e)
{
	Transaction::rollback();
	echo "Erro : ".$e->getMessage();
}
