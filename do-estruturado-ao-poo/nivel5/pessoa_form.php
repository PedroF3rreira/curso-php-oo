<?php 
	require_once 'db/pessoa_db.php';

	$pessoa = [];
	
	$pessoa['id'] 			= '';
	$pessoa['nome'] 		= '';
	$pessoa['endereco'] 	= '';
	$pessoa['bairro'] 		= '';
	$pessoa['telefone'] 	= '';
	$pessoa['email'] 		= '';
	$pessoa['id_cidade']  	= '';
	
	if(!empty($_REQUEST['action']))
	{
		if( $_REQUEST['action'] == 'edit')
		{
			if(!empty($_GET['id']) && is_numeric($_GET['id']))
			{
				
				$pessoa = get_pessoa($_GET['id']);
			}
		}
		else if($_REQUEST['action'] == 'save')
		{
			$pessoa['id'] 	= $_POST['id'];
			$pessoa 		= $_POST; 

			if(!empty($pessoa['id']))
			{
				
				if(update_pessoa($pessoa))
				{
					echo "Editado com suscesso!";
				}
			}
			else
			{
				
				if(insert_pessoa($pessoa))
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
?>
