<?php 
//método carrega arquivo em mémoria
$filmes = simplexml_load_file('filmes.xml');

//método pega filhos dos elementos
$filmes->children();


//Uma forma de percorrer o xml
foreach($filmes->filme as $filme)
{
	echo "<br><br>Titulo: ".$filme->titulo;
	echo "<br>Resumo: ".$filme->resumo;
	echo "<br>Genero: ".$filme->genero;
	echo "<br>Elenco: ". implode(' <br> ', (array) $filme->elenco->ator);

}
///altera o arquivo em mémoria
//adicionando tags
//$filmes->filme->addChild('Duração', "1 hora");

//exibe o arquivo em formata xml
//echo $filmes->asXML();

//grava no arquivo em disco
//file_put_contents('filmes2.xml', $filmes->asXML());

// echo "<pre>";

echo "<br><br>Qualidades:";
//iterando em elementos com valores emburtidos na tag
foreach($filmes->filme->qualidades->qualidade as $qualidade)
{
	echo "<br>".$qualidade['qualidade']." / ".$qualidade['resolucao'];
}
echo"<br>";

//forma utilizada quando não sabemos os nomes dos atributos do elementos
foreach($filmes->filme->qualidades->qualidade as $qualidade)
{
	foreach($qualidade->attributes() as $key => $value)
	{
		echo " $key  : $value ";
	}
	echo"<br>";
}

// var_dump($filmes);
// var_dump($filmes->children());
// echo "<br>". $filmes->titulo;
// echo "<br>".$filmes->resumo;
// echo "<br>".implode(" / ", (array) $filmes->genero);