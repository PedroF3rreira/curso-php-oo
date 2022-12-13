<?php 

$dados = $_POST;

if($_POST['id'])
{
	$conn = mysqli_connect('localhost', 'root','', 'livro');

	$sql = "UPDATE pessoas SET 
	
		nome='{$dados['nome']}',
		endereco='{$dados['endereco']}',
		bairro='{$dados['bairro']}',
		id_cidade='{$dados['id_cidade']}',
		telefone='{$dados['telefone']}',
		email='{$dados['email']}'

	WHERE id = {$dados['id']}";

	$result = mysqli_query($conn, $sql);

	if($result)
	{
		echo "Editado com suscesso!";
		echo "<a href='index.php'>Voltar para lista</a>";
	}
	else
	{
		echo "erro ao tentar editar";
	}
	mysqli_close($conn);
}
else
{
	echo "Pessoa ñao encontrada";
}

