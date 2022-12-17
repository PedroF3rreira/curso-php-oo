<?php 

class Cidade
{
	
	public static function all()
	{
		
		$pdo = new PDO('mysql:dbname=livro;host=localhost', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$result = $pdo->query("SELECT * FROM cidades");
		
		return $result->fetchAll(PDO::FETCH_ASSOC);
		
	}

	public static function getCidade($id)
	{
		
		$pdo = new PDO('mysql:dbname=livro;host=localhost', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$result = $pdo->query("SELECT * FROM cidades WHERE id = $id");

		$data = $result->fetchAll(PDO::FETCH_ASSOC);

		return $data;
	}
}