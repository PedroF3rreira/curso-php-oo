<?php 
	require_once 'classes/Pessoa.php';
	require_once 'classes/Cidade.php';

	$pessoa = [];
	
	$pessoa['id'] 			= '';
	$pessoa['nome'] 		= '';
	$pessoa['endereco'] 	= '';
	$pessoa['bairro'] 		= '';
	$pessoa['telefone'] 	= '';
	$pessoa['email'] 		= '';
	$pessoa['id_cidade']  	= '';
	
	try
	{
		if(!empty($_REQUEST['action']))
		{
			if( $_REQUEST['action'] == 'edit')
			{
				if(!empty($_GET['id']))
				{

					$pessoa = Pessoa::find( (int) $_GET['id']);
				}
			}
			else if($_REQUEST['action'] == 'save')
			{
				$pessoa = $_POST; 

				if(Pessoa::save($pessoa))
				{
					echo"salvo com suscesso!";
				}
			}

		}

		$cidades = '';

		foreach (Cidade::all() as $cidade) 
		{	
			$check = '';

			$id = $cidade['id'];
			$nome = $cidade['nome'];

			($pessoa['id_cidade'] == $id) ? $check = 'selected' : '';

			$cidades .= "<option $check value='$id'>$nome</option>";
		}

	}
	catch(Exception $e)
	{
		echo "Um erro Ocorreu ".$e->getMessage();
		die();
	}
	
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
?>
