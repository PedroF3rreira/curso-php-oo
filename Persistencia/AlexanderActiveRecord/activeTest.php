<?php 
require_once 'classes/ActiveRecord.php';
require_once 'classes/Produto.php';

$p = new Produto;
$p->descricao = "porta calha";

var_dump($p);