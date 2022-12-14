<?php 

function get_pessoa($id)
{
	$pessoa = [];
	$conn = mysqli_connect('localhost', 'root', '', 'livro');

	$result = mysqli_query($conn, 
					"SELECT pessoas.*, cidades.nome as nome_cidade FROM pessoas 
					INNER JOIN cidades ON pessoas.id_cidade=cidades.id 
				WHERE pessoas.id = $id ");

	$pessoa = mysqli_fetch_assoc($result);

	mysqli_close($conn);

	return $pessoa;

}
function get_pessoas() : array
{
	$pessoa = [];

	$conn = mysqli_connect('localhost', 'root', '', 'livro');
	$sql = "SELECT  
		pessoas.*, 
		cidades.nome as cidade_nome 
	FROM pessoas INNER JOIN cidades ON pessoas.id_cidade=cidades.id";

	$result = mysqli_query($conn, $sql);
	
	while($pessoa = mysqli_fetch_assoc($result))
	{
		$pessoas[] = $pessoa;
	}
		
	mysqli_close($conn);

	return $pessoas;
}

function delete_pessoa($id) : bool
{
	$conn = mysqli_connect('localhost', 'root', '', 'livro');
	$sql = "DELETE FROM pessoas WHERE id = $id";

	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
	
	return $result;
}

function insert_pessoa(array $pessoa) : bool
{
	$conn = mysqli_connect('localhost', 'root', '', 'livro');
	$sql = "INSERT INTO pessoas (nome, endereco, bairro, telefone, email, id_cidade)
				VALUES ('{$pessoa['nome']}', '{$pessoa['endereco']}', '{$pessoa['bairro']}', '{$pessoa['telefone']}', '{$pessoa['email']}', '{$pessoa['id_cidade']}')";

	$result = mysqli_query($conn, $sql);

	mysqli_close($conn);

	return $result;

}

function update_pessoa(array $pessoa) : bool
{

	$conn = mysqli_connect('localhost', 'root', '', 'livro');
	$result = mysqli_query($conn, "UPDATE pessoas SET 
					nome 		= '{$pessoa['nome']}',
					endereco 	= '{$pessoa['endereco']}',
					bairro 		= '{$pessoa['bairro']}',
					telefone 	= '{$pessoa['telefone']}',
					email 		= '{$pessoa['email']}',
					id_cidade 	= '{$pessoa['id_cidade']}'
					WHERE id = '{$pessoa['id']}'");
	mysqli_close($conn);

	return $result;

}