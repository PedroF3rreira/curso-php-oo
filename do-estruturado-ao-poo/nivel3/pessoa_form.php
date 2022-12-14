<?php 
	$pessoa = [];
	
	$pessoa['id'] 			= '';
	$pessoa['nome'] 		= '';
	$pessoa['endereco'] 	= '';
	$pessoa['bairro'] 		= '';
	$pessoa['telefone'] 	= '';
	$pessoa['email'] 		= '';
	$pessoa['id_cidade']  	= '';

	$conn = mysqli_connect('localhost', 'root', '', 'livro');
	
	if(!empty($_REQUEST['action']))
	{
		if( $_REQUEST['action'] == 'edit')
		{
			if(!empty($_GET['id']) && is_numeric($_GET['id']))
			{
				$result = mysqli_query($conn, 
					"SELECT pessoas.*, cidades.nome as nome_cidade FROM pessoas 
					INNER JOIN cidades ON pessoas.id_cidade=cidades.id 
					WHERE pessoas.id = '{$_GET['id']}' ");

				$row = mysqli_fetch_assoc($result);

				$pessoa['id'] 			= 	$row['id'];
				$pessoa['nome'] 		= 	$row['nome'];
				$pessoa['endereco'] 	= 	$row['endereco'];
				$pessoa['bairro'] 		=	$row['bairro'];
				$pessoa['telefone'] 	= 	$row['telefone'];
				$pessoa['email'] 		= 	$row['email'];
				$pessoa['id_cidade'] 	= 	$row['id_cidade'];

			}
		}
		else if($_REQUEST['action'] == 'save')
		{
			$pessoa['id'] 	= $_POST['id'];
			$pessoa 		= $_POST; 

			if(!empty($pessoa['id']))
			{
				$result = mysqli_query($conn, "UPDATE pessoas SET 
					nome 		= '{$pessoa['nome']}',
					endereco 	= '{$pessoa['endereco']}',
					bairro 		= '{$pessoa['bairro']}',
					telefone 	= '{$pessoa['telefone']}',
					email 		= '{$pessoa['email']}',
					id_cidade 	= '{$pessoa['id_cidade']}'
					WHERE id = '{$pessoa['id']}'");

				if($result)
				{
					echo "Editado com suscesso!";
				}
			}
			else
			{
				$sql = "INSERT INTO pessoas (nome, endereco, bairro, telefone, email, id_cidade)
				VALUES ('{$pessoa['nome']}', '{$pessoa['endereco']}', '{$pessoa['bairro']}', '{$pessoa['telefone']}', '{$pessoa['email']}', '{$pessoa['id_cidade']}')";

				$result = mysqli_query($conn, $sql);

				if($result)
				{
					echo "registro adicionado com suscesso";
				}
			}
		}

	}

require_once 'lista_combo_cidades.php';
$cidades = lista_combo_cidades($pessoa['id_cidade']);

$form = file_get_contents('html/form.html');
$form = str_replace('{id}', $pessoa['id'], $form);
$form = str_replace('{nome}', $pessoa['nome'], $form);
$form = str_replace('{bairro}', $pessoa['bairro'], $form);
$form = str_replace('{endereco}', $pessoa['endereco'], $form);
$form = str_replace('{telefone}', $pessoa['telefone'], $form);
$form = str_replace('{email}', $pessoa['email'], $form);
$form = str_replace('{id_cidade}', $pessoa['id_cidade'], $form);
$form = str_replace('{cidades}', $cidades, $form);

echo $form;
mysqli_close($conn);
?>
