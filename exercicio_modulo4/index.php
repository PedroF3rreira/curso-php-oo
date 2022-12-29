<?php 

$load = require_once __DIR__.'/vendor/autoload.php';
$load->register();

$classe = isset($_REQUEST['class']) ? 'App\\Web\\'.$_REQUEST['class'] : 'App\\Web\\PessoaController';
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'listPessoa';

if(class_exists( $classe ))
{
	$pagina = new $classe();

	if(!empty($method) && method_exists($pagina, $method))
	{
		$pagina->$method( $_REQUEST );
	}
}
