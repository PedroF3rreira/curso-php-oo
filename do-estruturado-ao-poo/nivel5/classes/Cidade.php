<?php 

class Cidade
{
	
	public function getCidades()
	{
		
		$pdo = new PDO('mysql:dbname=livro;host=localhost', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$result = $pdo->query("SELECT * FROM cidades");

		$data = $result->fetchAll(PDO::FETCH_ASSOC);

		return $data;
	}
}