<?php 

$doc = new DOMDocument(1.0, "UTF-8");

//carrega arquivo em um objeto domDocument
$doc->load('./filmes.xml');

//pega tags do documento e retorna um coleção de nodes
$tags = $doc->getElementsByTagName('filme');

foreach ($tags as $filme) {
	echo"<br>ID: " . $filme->getAttribute('id');
	
	$titulos = $filme->getElementsByTagName('titulo');
	$resumos = $filme->getElementsByTagName('resumo');
	$generos = $filme->getElementsByTagName('genero');
	
	echo " <br>Titulo: " . $titulos->item(0)->nodeValue;	
	echo " <br>Resumo: " . $resumos->item(0)->nodeValue;
	echo " <br>Genero: " . $generos->item(0)->nodeValue ." ". $generos->item(1)->nodeValue;				
}
