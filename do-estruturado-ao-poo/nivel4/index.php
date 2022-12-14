<?php 
	require_once 'db/pessoa_db.php';

	if(!empty($_GET['action']) && ($_GET['action'] == 'delete') )
	{
		$id = (int) $_GET['id'];

		if(delete_pessoa($id))
		{
			echo "registro excluido com suscesso!";
		}

		
	}
	$pessoas = get_pessoas();
	$items = "";
	foreach( $pessoas as $pessoa)
	{
		
		$item = file_get_contents('html/item.html');
		$item = str_replace('{id}', $pessoa['id'], $item);
		$item = str_replace('{nome}', $pessoa['nome'], $item);
		$item = str_replace('{endereco}', $pessoa['endereco'], $item);
		$item = str_replace('{bairro}', $pessoa['bairro'], $item);
		$item = str_replace('{telefone}', $pessoa['telefone'], $item);
		$item = str_replace('{email}', $pessoa['email'], $item);
		$item = str_replace('{cidade}', $pessoa['cidade_nome'], $item);		
		
		$items .= $item;
	}
	
	$list = file_get_contents('html/list.html');
	$list = str_replace('{items}', $items, $list);

	echo $list;
?>