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
		
		$result = $pdo->prepare("SELECT pessoas.*, cidades.nome as nome_cidade FROM pessoas 
					INNER JOIN cidades ON pessoas.id_cidade=cidades.id 
				WHERE pessoas.id = :id ");
		
		$result->execute(['id' => $id]);

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

		$result = $pdo->prepare("DELETE FROM pessoas WHERE id = :id");
		$result->execute(['id' => $id]);
		
		return $result;
		
	}

	public static function save(array $pessoa)
	{
		
		$pdo = self::getConnection();

		if(empty($pessoa['id']))
		{
			$result = $pdo->prepare("INSERT INTO pessoas (nome, endereco, bairro, telefone, email, id_cidade)
				VALUES (:nome, :endereco, :bairro, :telefone, :email, :id_cidade)");
			$result->execute([
				'nome' => $pessoa['nome'],
				'endereco' => $pessoa['endereco'],
				'bairro' => $pessoa['bairro'],
				'telefone' => $pessoa['telefone'],
				'email' => $pessoa['email'],
				'id_cidade' => $pessoa['id_cidade']
			]);

			return $result;
		}
		else{

			$result = $pdo->prepare("UPDATE pessoas SET 
					nome 		= :nome,
					endereco 	= :endereco,
					bairro 		= :bairro,
					telefone 	= :telefone,
					email 		= :email,
					id_cidade 	= :id_cidade
					WHERE id = :id");
			$result->execute([
				'nome' => $pessoa['nome'],
				'endereco' => $pessoa['endereco'],
				'bairro' => $pessoa['bairro'],
				'telefone' => $pessoa['telefone'],
				'email' => $pessoa['email'],
				'id_cidade' => $pessoa['id_cidade'],
				'id' => $pessoa['id']
			]);

			return $result;
		}
	}
}