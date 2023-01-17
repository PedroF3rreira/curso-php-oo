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

use Livro\Database\Transaction;
use Livro\Database\Connection;
//use App\Model\Pessoa;

var_dump(Connection::open('livro'));

Transaction::open('livro');
var_dump(Pessoa::find(8));
Transaction::close();
