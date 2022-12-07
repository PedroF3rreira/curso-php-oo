<?php 

require 'classes/OrcavelInterface.php';
require 'classes/Produto.php';
require 'classes/Orcamento.php';
require 'classes/Servico.php';



$p1 = new Produto('Carro vermelho', 10, 125.69);
$p2 = new Produto('Carro azul', 80, 521.60);
$p3 = new Produto('Carro amarelo', 20, 236.79);

$s1 = new Servico('Eletricista', 25);
$s2 = new Servico('Pedreiro', 100);
$s3 = new Servico('Pintura', 525);

$o = new Orcamento();
$o->adicionarItem($p1, 12);
$o->adicionarItem($p2, 2);
$o->adicionarItem($p3, 6);

$o->adicionarItem($s1, 1);
$o->adicionarItem($s2, 2);
$o->adicionarItem($s3, 6);


echo "Descrição ====> Quantidade <br>";
foreach($o->getItens() as $item)
{	
	echo "{$item[1]->getDescricao()} ===> {$item[0]}<br>";
}

echo"<br>Chamando método para calcular total do orcamento<br>";

echo "<br>{$o->total()}<br>";