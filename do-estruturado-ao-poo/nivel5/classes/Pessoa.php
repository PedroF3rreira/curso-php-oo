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

		return $data;
	}

	public static function all()
	{
		
		$pdo = new PDO('mysql:dbname=livro;host=localhost', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$result = $pdo->query("SELECT  
			pessoas.*, 
			cidades.nome as cidade_nome 
		FROM pessoas INNER JOIN cidades ON pessoas.id_cidade=cidades.id");

		$data = $result->fetchAll(PDO::FETCH_ASSOC);

		return $data;
		
	}

	public static function delete($id)
	{

		$pdo = new PDO('mysql:dbname=livro;host=localhost', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$result = $pdo->query("DELETE FROM pessoas WHERE id = $id");

		return $result;
		
	}

	public static function save(array $pessoa)
	{
		if(empty($pessoa['id']))
		{
			$pdo = new PDO('mysql:dbname=livro;host=localhost', 'root', '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$result = $pdo->query("INSERT INTO pessoas (nome, endereco, bairro, telefone, email, id_cidade)
				VALUES ('{$pessoa['nome']}', '{$pessoa['endereco']}', '{$pessoa['bairro']}', '{$pessoa['telefone']}', '{$pessoa['email']}', '{$pessoa['id_cidade']}')");

			return $result;
		}
		else{

			$result = $pdo->query("UPDATE pessoas SET 
					nome 		= '{$pessoa['nome']}',
					endereco 	= '{$pessoa['endereco']}',
					bairro 		= '{$pessoa['bairro']}',
					telefone 	= '{$pessoa['telefone']}',
					email 		= '{$pessoa['email']}',
					id_cidade 	= '{$pessoa['id_cidade']}'
					WHERE id = '{$pessoa['id']}'");
			return $result;
		}
	}
}