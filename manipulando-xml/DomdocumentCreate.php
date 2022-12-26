<?php 

$listProducts = [
	[
		'id' => 1,
		'descricao' => 'Bola de gude',
		'quantidade' => 210,
		'preco' => 200 
	],
	[
		'id' => 2,
		'descricao' => 'Pipa do sport',
		'quantidade' => 21,
		'preco' => 10 
	],
	[
		'id' => 3,
		'descricao' => 'Pião de corda',
		'quantidade' => 124,
		'preco' => 15.99 
	],
];

$doc = new DOMDocument('1.0', 'UTF-8');
$doc->formatOutput = true;//formata a identação

$produtos = $doc->createElement('produtos');
$doc->appendChild($produtos);

foreach($listProducts as $product)
{
	$produto = $doc->createElement('produto');
	$produtos->appendChild($produto);
	
	$idProduct = $doc->createAttribute('id');
	$idProduct->value = $product['id'];
	$produto->appendChild($idProduct);

	$produto->appendChild($doc->createElement('descricao', $product['descricao']));
	$produto->appendChild($doc->createElement('preco', $product['preco']));
	$produto->appendChild($doc->createElement('quantidade', $product['quantidade']));	
}

$doc->save('domDocumentTeste.xml');