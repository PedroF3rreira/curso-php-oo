<?php 
	require_once 'pessoa_db.php';

	if(!empty($_GET['action']) && ($_GET['action'] == 'delete') )
	{
		$id = (int) $_GET['id'];

		if(delete_pessoa($id))
		{
			echo "registro excluido com suscesso!";
		}

		
	}

	$items = "";
	foreach(get_pessoas() as $row)
	{
		
		$item = file_get_contents('html/item.html');
		$item = str_replace('{id}', $row['id'], $item);
		$item = str_replace('{nome}', $row['nome'], $item);
		$item = str_replace('{endereco}', $row['endereco'], $item);
		$item = str_replace('{bairro}', $row['bairro'], $item);
		$item = str_replace('{telefone}', $row['telefone'], $item);
		$item = str_replace('{email}', $row['email'], $item);
		$item = str_replace('{cidade}', $row['cidade_nome'], $item);		
		
		$items .= $item;
	}
	
	$list = file_get_contents('html/list.html');
	$list = str_replace('{items}', $items, $list);

	echo $list;
?>