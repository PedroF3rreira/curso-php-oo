<?php 

$dir = opendir('./');

while($arquivo = readdir($dir))
{
	echo $arquivo. "<br>";
}

closedir($dir);