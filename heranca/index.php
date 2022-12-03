<?php 

require'classes/Conta.php';
require'classes/ContaPoupanca.php';
require'classes/ContaCorrente.php';

$c1 = new Conta(0,'2512','25658944544');
$c1->depositar(1000);

$cp1 = new ContaPoupanca(100,'2282','211111111114');
$cp1->depositar(10);

echo"<br>=============Conta==============<br>";
var_dump($c1);


echo"<br>=============Conta poupanca==============<br>";
var_dump($cp1);

echo"<br>=============Conta poupanca Executando retirar==============<br>";
$cp1->retirar(51.6);

echo"<br>=============Conta corrente==============<br>";
$cc = new ContaCorrente(100, '1455', '1446456488', 500);
$cc->retirar(500);

//Polimorfismo so acontece quando temos classes que derivam de um pai com métodos iguas mas com a
//implementação diferente