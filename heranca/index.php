<?php 

require'classes/Conta.php';
require'classes/ContaPoupanca.php';

$c1 = new Conta(225,'2512','25658944544');
$c1->depositar(1000);

$cp1 = new ContaPoupanca(100,'2282','211111111114');

echo"<br>=============Conta==============<br>";
var_dump($c1);


echo"<br>=============Conta poupanca==============<br>";
var_dump($cp1);

echo"<br>=============Conta poupanca Executando retirar==============<br>";
$cp1->retirar(51.6);