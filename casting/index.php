<?php 

echo "Objeto StdClass <br>";

$produto = new StdClass;
$produto ->descricao = "Boneco do Homem Aranha";
$produto->estoque  = 52;
$produto->preco = 169.65;

var_dump($produto);


echo "Objeto StdClass convertido em um array <br>";

$array = (array) $produto;

var_dump($array);

echo $array['descricao'];

echo "Convertendo vetoor em um objeto <br>";

$vetor = ['descricao' => 'GameBoy', 'estoque' => 20, 'preco' => 125.69];

$produto2 = (object) $vetor;

var_dump($produto2);

echo "tecnica que permite definir atributos de formas dinamica em objetos <br>";

$produto = ['descricao' => 'homem areia', 'estoque' => 20, 'preco' => 25.98];

$objeto = new StdClass;

foreach($produto as $key => $value)
{
	$objeto->$key = $value;
}

var_dump($objeto);