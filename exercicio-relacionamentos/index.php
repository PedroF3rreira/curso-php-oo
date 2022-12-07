<?php 
require 'Participante.php';
require 'Ministro.php';
require 'Palestra.php';
require 'Evento.php';



$m = new Ministro('Pedro','88888888', 'rua da rua 8', 'pedro@gmail.com');

echo "<br>====Ministro da Palestra=====<br>";
var_dump($m);

echo "<br>========Palestras Criadas===========<br>";
$p1 = new Palestra('oo php','25-10-2022', 'N', '1', 'oo', 'a21', $m);
$p2 = new Palestra('javascript','30-10-2022', 't', '3', 'jvascript', 'a30', $m);
$p3 = new Palestra('Progamando com dart','20-10-2022', 'd', '2', 'dart', 'a21', $m);

echo $p1->getNome()."<br>";
echo $p2->getNome()."<br>";
echo $p3->getNome()."<br>";

echo "<br>===========Eventos criados==========<br>";
$e1 = new Evento('Mult X', 'cidade nova', '22-05-2022', '08:30:20', '17:30:00');
$e1->adicionaPalestra($p1);
$e1->adicionaPalestra($p3);

echo $e1->getNome()."<br>";

$e2 = new Evento('Super Evento', 'cidade goias', '14-05-2022', '08:30:20', '17:30:00');
$e2->adicionaPalestra($p2);
$e2->adicionaPalestra($p3);

echo $e2->getNome()."<br>";

echo "<br>===========palestras de Eventos==========<br>";
var_dump($e1);
var_dump($e2);


echo"<br>====================Participantes============<br>";

$part = new Participante('Elias', '98559744', 'rua 25 de marco', 'elias@email.com');
var_dump($part);

echo"<br>====================Participantes se increve em evento============<br>";
$part->inscreveEvento($e1);
$part->inscreveEvento($e2);
var_dump($part);

echo"<br>====================Participantes se increve em palestra============<br>";
$part->inscrevePalestra($p1);
$part->inscrevePalestra($p2);
$part->inscrevePalestra($p3);


