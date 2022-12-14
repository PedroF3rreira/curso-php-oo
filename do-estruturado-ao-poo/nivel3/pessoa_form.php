<?php 
	
	$id 		= '';
	$nome 		= '';
	$endereco 	= '';
	$bairro 	= '';
	$telefone 	= '';
	$email 		= '';
	$id_cidade  = '';

	$conn = mysqli_connect('localhost', 'root', '', 'livro');
	if(!empty($_REQUEST['action']))
	{
		if( $_REQUEST['action'] == 'edit')
		{
			if(!empty($_GET['id']))
			{
				$result = mysqli_query($conn, 
					"SELECT pessoas.*, cidades.nome as nome_cidade FROM pessoas 
					INNER JOIN cidades ON pessoas.id_cidade=cidades.id 
					WHERE pessoas.id = '{$_GET['id']}' ");

				$row = mysqli_fetch_assoc($result);

				$id 		= 	$row['id'];
				$nome 		= 	$row['nome'];
				$endereco 	= 	$row['endereco'];
				$bairro 	=	$row['bairro'];
				$telefone 	= 	$row['telefone'];
				$email 		= 	$row['email'];
				$id_cidade  = 	$row['id_cidade'];

			}
		}
		else if($_REQUEST['action'] == 'save')
		{
			$id 		= $_POST['id'];
			$nome 		= $_POST['nome'];
			$endereco 	= $_POST['endereco'];
			$bairro 	= $_POST['bairro'];
			$telefone 	= $_POST['telefone'];
			$email 		= $_POST['email'];
			$id_cidade 	= $_POST['id_cidade'];

			if(!empty($id))
			{
				$result = mysqli_query($conn, "UPDATE pessoas SET 
					nome 		= '$nome',
					endereco 	= '$endereco',
					bairro 		= '$bairro',
					telefone 	= '$telefone',
					email 		= '$email',
					id_cidade 	= '$id_cidade'
					WHERE id = $id");

				if($result)
				{
					echo "Editado com suscesso!";
				}
			}
			else
			{
				$sql = "INSERT INTO pessoas (nome, endereco, bairro, telefone, email, id_cidade)
				VALUES ('{$nome}', '{$endereco}', '{$bairro}', '{$telefone}', '{$email}', '{$id_cidade}')";

				$result = mysqli_query($conn, $sql);

				if($result)
				{
					echo "registro adicionado com suscesso";
				}
			}
		}

	}

require_once 'lista_combo_cidades.php';
$cidades = lista_combo_cidades($id_cidade);

$form = file_get_contents('html/form.html');
$form = str_replace('{id}', $id, $form);
$form = str_replace('{nome}', $nome, $form);
$form = str_replace('{bairro}', $bairro, $form);
$form = str_replace('{endereco}', $endereco, $form);
$form = str_replace('{telefone}', $telefone, $form);
$form = str_replace('{email}', $email, $form);
$form = str_replace('{id_cidade}', $id_cidade, $form);
$form = str_replace('{cidades}', $cidades, $form);

echo $form;
mysqli_close($conn);
?>
