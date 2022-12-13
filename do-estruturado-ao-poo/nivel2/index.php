<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>listagem de pessoas</title>
</head>
<body>
	<div>
		<p>
			<?php
				if($_SESSION['flash'])
				{
					echo $_SESSION['flash'];
					$_SESSION['flash'] = '';
				}
		  	?>
		  	
		  </p>
	</div>
	<table >
		<thead>
			<th></th>
			<th></th>
			<th>Id</th>
			<th>Nome</th>
			<th>Endereço</th>
			<th>Bairro</th>
			<th>Cidade</th>
			<th>Telefone</th>
			<th>Email</th>
		</thead>
		<tbody>
			<?php 

				$conn = mysqli_connect('localhost', 'root', '', 'livro');

				$sql = "SELECT *, pessoas.nome as pessoa, pessoas.id as id_pessoa FROM pessoas INNER JOIN cidades ON pessoas.id_cidade=cidades.id";

				$result = mysqli_query($conn, $sql);

				if(!empty($_GET['action']) && ($_GET['action'] == 'delete') )
				{
					$id = (int) $_GET['id'];

					$sql = "DELETE FROM pessoas WHERE id = $id";
					$success = mysqli_query($conn, $sql);
					
					if($success)
					{
						$_SESSION['flash'] = 'Registro deletado com suscesso';
						header('location:index.php');
					}

					
				}

				while($row = mysqli_fetch_assoc($result)){
					echo "
						<tr>
							<td><a href='pessoa_form.php?action=edit&id={$row['id_pessoa']}'>editar</a></td>
							<td> <a href='index.php?action=delete&id={$row['id_pessoa']}'>excluir</a></td>
							<td>{$row['id_pessoa']}</td>
							<td>{$row['pessoa']}</td>
							<td>{$row['endereco']}</td>
							<td>{$row['bairro']}</td>
							<td>{$row['nome']}</td>
							<td>{$row['telefone']}</td>
							<td>{$row['email']}</td>
						</tr>
					";
				}

				mysqli_close($conn);
			?>
		</tbody>
	</table>
	<a href="pessoa_form_insert.php" title="adicionar pessoa">Adicionar</a>
</body>
</html>