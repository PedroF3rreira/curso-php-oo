<?php 

require'classes/Conta.php';
require'classes/ContaPoupanca.php';
require'classes/ContaCorrente.php';
require'classes/ContaCorrenteEspecial.php';
// require'classes/ContaPoupancaUni.php';


$cp1 = new ContaPoupanca(100,'2282','211111111114');
$cp1->depositar(10);


echo"<br>=============Conta poupanca==============<br>";
var_dump($cp1);

echo"<br>=============Conta poupanca Executando retirar==============<br>";
$cp1->retirar(51.6);

echo"<br>=============Conta corrente==============<br>";
$cc = new ContaCorrente(100, '1455', '1446456488', 500);
var_dump($cc);

echo"<br>=============retirada da Conta corrente==============<br>";
$cc->retirar(500);

echo "<br>============ContaCorrenteEspecial ===============<br>";
$cce = new ContaCorrenteEspecial(100,'1411', '222222225555555',422);
$cce->retirar(10);



//Polimorfismo so acontece quando temos classes que derivam de um pai com métodos iguas mas com a
//implementação diferente