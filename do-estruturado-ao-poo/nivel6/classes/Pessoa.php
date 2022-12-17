<?php 

/**
 * 
 */
class Pessoa
{
	private static $pdo;
	
	public static function getConnection()
	{	
		if(empty(self::$pdo))
		{
			$db = parse_ini_file('config/config.ini');
			$name = $db['name'];
			$host = $db['host'];
			$user = $db['user'];
			$pass = $db['pass'];

			self::$pdo = new PDO("mysql:dbname={$name};host={$host}", $user, $pass);
			self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		return self::$pdo;
		
	}

	public static function find($id)
	{
		$pdo = self::getConnection();
		
		$result = $pdo->query("SELECT pessoas.*, cidades.nome as nome_cidade FROM pessoas 
					INNER JOIN cidades ON pessoas.id_cidade=cidades.id 
				WHERE pessoas.id = $id ");
		$data = $result->fetch();

		return $data;
	}

	public static function all()
	{
		$pdo = self::getConnection();

		$result = $pdo->query("SELECT  
			pessoas.*, 
			cidades.nome as cidade_nome 
		FROM pessoas INNER JOIN cidades ON pessoas.id_cidade=cidades.id");

		$data = $result->fetchAll(PDO::FETCH_ASSOC);

		return $data;
		
	}

	public static function delete($id)
	{
		$pdo = self::getConnection();

		$result = $pdo->query("DELETE FROM pessoas WHERE id = $id");

		return $result;
		
	}

	public static function save(array $pessoa)
	{
		
		$pdo = self::getConnection();

		if(empty($pessoa['id']))
		{
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