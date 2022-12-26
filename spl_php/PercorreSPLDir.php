<?php 

$files = new DirectoryIterator('./');

foreach($files as $file)
{
	echo "".(string) $file."<br>";
	echo "Nome: " . $file->getFilename()."<br>";
	echo "Extensão: " . $file->getExtension()."<br>";
	echo "Tamanho: " . $file->getSize();
	echo "<br><br>";
}