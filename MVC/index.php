<?php 

/**
 * este arquivo centraliza nossas requisições ao aplicativo
 * aqui podemos definir nossa timezone controle de permições
 * executa nossos autoloads e é o unico ponto de acesso a nosso app 
 */
require 'Lib/Livro/Core/ClassLoader.php';

$l = new Livro\Core\ClassLoader;
$l->addNamespace('Livro', 'Lib/Livro');
$l->register();

require 'Lib/Livro/Core/AppLoader.php';
$app = new Livro\Core\AppLoader;
$app->addDirectory('App/Control');
$app->addDirectory('App/Model');
$app->register();

$loader = require 'vendor/autoload.php';
$loader->register();

//método pega qual classe será instanciada pelo atributo passado na url
if( $_GET )
{
	$class = $_GET['class'];

	if(class_exists($class))
	{
		$pagina = new $class;
		$pagina->show();
	}
}

echo '<link rel="stylesheet" href="App/Templates/css/bootstrap.min.css"/>';