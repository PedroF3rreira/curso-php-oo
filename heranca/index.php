<?php 

require'classes/Conta.php';

$c1 = new Conta(225,'2512','25658944544');
$c1->depositar(1000);

var_dump($c1);
