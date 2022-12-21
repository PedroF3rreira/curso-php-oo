<?php 

spl_autoload_register(function($class){
	if(file_exists('classes/'.$class . '.php'))
	{
		require_once 'classes/'.$class . '.php';
	}
});

$classe = isset($_REQUEST['class']) ? $_REQUEST['class'] : 'PessoaList';
$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : '';

if(class_exists( $classe ))
{
	$pagina = new $classe();

	if(!empty($method) && method_exists($pagina, $method))
	{
		$pagina->$method( $_REQUEST );
	}
	$pagina->show();
}
