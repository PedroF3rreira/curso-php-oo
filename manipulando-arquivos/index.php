<?php 

if(file_exists('texto.txt')){
	
	//abre um arquivo para leitura
	$handle = fopen('texto.txt', 'r');

	while( ! feof($handle) ){
		echo "<br>Carrega arquivo linha por linha<br>";
		echo fgets($handle, 4096);
	}
}

$handle = fopen('novo_texto.txt', 'w');

if(file_exists('novo_texto.txt')){
	//gravando conteudo no arquivo
	fwrite($handle, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ".PHP_EOL);
	fwrite($handle, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ".PHP_EOL);
	fwrite($handle, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ".PHP_EOL);
}

//carrego o arquivo completo
echo"<br><br>Texto carrego pro completo com file_get_contents <br><br>";
echo file_get_contents('novo_texto.txt');

//função file converte arquivo em array
$array = file('novo_texto.txt');

var_dump($array);

copy('novo_texto.txt', 'novo_texto2.txt');

rename('novo_texto2.txt', 'novo_texto3.txt');

if(file_exists('novo_texto3')){
	unlink('novo_texto3');
}


//mkdir('novo_diretorio');

copy('novo_texto3.txt', 'novo_diretorio/novo_texto3.txt');

echo "Escaneia o diretorio";
var_dump(scandir('novo_diretorio'));