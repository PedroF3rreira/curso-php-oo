<?php 

require 'Lib/Livro/Core/ClassLoader.php';

$l = new Livro\Core\ClassLoader;
$l->addNamespace('Livro', 'Lib/Livro');
$l->register();

require 'Lib/Livro/Core/AppLoader.php';
$app = new Livro\Core\AppLoader;
$app->addDirectory('App/Control');
$app->addDirectory('App/Model');
$app->register();


$pc = new PessoaControl;
$pc->show( $_GET );