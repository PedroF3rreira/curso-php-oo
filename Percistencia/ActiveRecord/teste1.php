<?php 	
require_once 'classes/Produto.php';
require_once 'classes/Connection.php';

Produto::setConnection(Connection::getInstance());
var_dump(Produto::all('celular'));