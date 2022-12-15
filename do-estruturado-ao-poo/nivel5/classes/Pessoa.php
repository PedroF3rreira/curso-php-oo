<?php 

/**
 * 
 */
class Pessoa
{
	
	public static function find($id)
	{
		$pdo = new PDO('mysql:dbname=livro;host=localhost', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$result = $pdo->query("SELECT pessoas.*, cidades.nome as nome_cidade FROM pessoas 
					INNER JOIN cidades ON pessoas.id_cidade=cidades.id 
				WHERE pessoas.id = $id ");
		$data = $result->fetch();

		var_dump($data);
	}

	public static function all()
	{
		
	}

	public static function delete($id)
	{
		
	}

	public static function save(aray $pessoa)
	{
		
	}
}