<?php 
/**
 * este arquivo é um ponto de entrada para os serviços de nosso app
 * seu retorno esta no padão rest
 * **/

header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");

//indica para client qual retorno aplicação vai ter
header('Content-Type: application/json; charset=utf-8');

require 'Lib/Livro/Core/ClassLoader.php';

$l = new Livro\Core\ClassLoader;
$l->addNamespace('Livro', 'Lib/Livro');
$l->register();

require 'Lib/Livro/Core/AppLoader.php';
$app = new Livro\Core\AppLoader;
$app->addDirectory('App/Control');
$app->addDirectory('App/Model');
$app->addDirectory('App/Services');
$app->register();

use Livro\Http\LivroRestService;


echo LivroRestService::run( $_REQUEST );