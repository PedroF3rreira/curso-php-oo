<?php 

$splFile = new SplFileInfo('arquivo.txt');
echo "<pre> nome completo co pastas". $splFile->getBaseName();
echo "<pre> Time ".$splFile->getATime();
echo "<pre> Extensão ".$splFile->getExtension();
echo "<pre> Nome do arquivo ".$splFile->getFilename();
echo "<pre> Nome do arquivo ".$splFile->getRealPath();
echo "<pre> Permite escrita? ".$splFile->isWritable();
