<?php 

$files = new RecursiveDirectoryIterator('../', RecursiveDirectoryIterator::SKIP_DOTS);
$iterator = new RecursiveIteratorIterator($files);

foreach($iterator as $item)
{
	echo "". (string) $item."<br>";
	//echo "Filename: ". $item->getFilename()."<br>";
}