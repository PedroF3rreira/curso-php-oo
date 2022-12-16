<?php 
	require_once 'db/pessoa_db.php';
	require_once 'classes/Pessoa.php';

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
			if(!empty($_GET['id']))
			{
				
				$pessoa = Pessoa::find( (int) $_GET['id']);
			}
		}
		else if($_REQUEST['action'] == 'save')
		{
			$pessoa = $_POST; 

			Pessoa::save($pessoa);
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
