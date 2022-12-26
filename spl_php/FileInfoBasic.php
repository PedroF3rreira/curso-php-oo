<?php 

class FileInfoBasic
{
	
	private $path;

	function __construct($path)
	{
		$this->path = $path;
	}

	public function getContents()
	{
		return file_get_contents($this->path);
	}

	public function getFileName()
	{
		return basename($this->path);
	}

	public function getExtension()
	{
		return pathinfo($this->path, PATHINFO_EXTENSION);
	}

	public function getSize()
	{
		return filesize($this->path);
	}

}

$f = new FileInfoBasic('arquivo.txt');

echo "Classe criada para acessar arquivo sem a SPL do php";
echo "<pre>".$f-> getContents();
echo "<pre>".$f-> getExtension();
echo "<pre>".$f-> getFileName();
echo "<pre>".$f-> getsize();