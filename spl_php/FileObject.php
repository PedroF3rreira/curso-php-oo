<?php 

$splFile = new SplFileObject('arquivo.txt', 'w');
echo "<pre> nome completo co pastas". $splFile->getBaseName();
echo "<pre> Time ".$splFile->getATime();
echo "<pre> Extensão ".$splFile->getExtension();
echo "<pre> Nome do arquivo ".$splFile->getFilename();
echo "<pre> Nome do arquivo ".$splFile->getRealPath();
echo "<pre> Permite escrita? ".$splFile->isWritable();

echo "<br>métodos do FieObject";
$write = $splFile->fwrite('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

echo "<br><br>";
echo"Lendo arquivo..... <br>";
$file2 = new SplFileObject('arquivo.txt', 'r');

while(!$file2->eof())
{
	echo $file2->fgets();
} 

echo "<br><br>";
echo "O SplFileObject implemente interator por isso podemos usar o foreach nele<br><br>";
foreach($file2 as $row => $value)
{
	echo "$row => $value";
}
