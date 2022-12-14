<?php 

	$conn = mysqli_connect('localhost', 'root', '', 'livro');


	if(!empty($_GET['action']) && ($_GET['action'] == 'delete') )
	{
		$id = (int) $_GET['id'];

		$sql = "DELETE FROM pessoas WHERE id = $id";
		$success = mysqli_query($conn, $sql);
		
		if($success)
		{
			echo "registro excluido com suscesso!";
		}

		
	}

	$sql = "SELECT *, 
		pessoas.nome as nome, 
		pessoas.id as id_pessoa, cidades.nome as cidade 
	FROM pessoas INNER JOIN cidades ON pessoas.id_cidade=cidades.id";

	$result = mysqli_query($conn, $sql);
	
	$items = "";
	while($row = mysqli_fetch_assoc($result)){
		
		$item = file_get_contents('html/item.html');
		$item = str_replace('{id}', $row['id_pessoa'], $item);
		$item = str_replace('{nome}', $row['nome'], $item);
		$item = str_replace('{endereco}', $row['endereco'], $item);
		$item = str_replace('{bairro}', $row['bairro'], $item);
		$item = str_replace('{telefone}', $row['telefone'], $item);
		$item = str_replace('{email}', $row['email'], $item);
		$item = str_replace('{cidade}', $row['cidade'], $item);		
		
		$items .= $item;
	}
	
	$list = file_get_contents('html/list.html');
	$list = str_replace('{items}', $items, $list);

	echo $list;
	
	mysqli_close($conn);
?>