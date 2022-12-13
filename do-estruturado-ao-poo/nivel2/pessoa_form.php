<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Pessoa form insert</title>
</head>
<body>
	<?php 
		$conn = mysqli_connect('localhost', 'root', '', 'livro');

		if(!empty($_GET['action']) && ($_GET['action'] == 'edit'))
		{
			$result = mysqli_query($conn, "SELECT pessoas.*, cidades.nome as nome_cidade
				FROM pessoas INNER JOIN cidades ON pessoas.id_cidade=cidades.id WHERE pessoas.id = '{$_GET['id']}' ");
			
			$row = mysqli_fetch_assoc($result);

			var_dump($row);

			$id = 		$row['id'];
			$nome = 	$row['nome'];
			$endereco = $row['endereco'];
			$bairro =	$row['bairro'];
			$telefone = $row['telefone'];
			$email = 	$row['email'];
		}

	 ?>
	<form action="pessoa_save_insert.php" method="POST" enctype="multipart/form-data">
		<div class="form-control">
			<label>Codígo:</label>
			<input type="text" name="id" readonly="1" value="<?=$id ?>">
		</div>

		<div class="form-control">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?=$nome ?>">
		</div>

		<div class="form-control">
			<label>Endereço:</label>
			<input type="text" name="endereco" value="<?=$endereco ?>">
		</div>

		<div class="form-control">
			<label>Bairro:</label>
			<input type="text" name="bairro" value="<?=$bairro ?>">
		</div>
		
		<div class="form-control">
			<label>Telefone:</label>
			<input type="text" name="telefone" value="<?=$telefone ?>">
		</div>

		<div class="form-control">
			<label>Email:</label>
			<input type="text" name="email" value="<?=$email ?>">
		</div>

		<div class="form-control">
			<label>Cidades:</label>
			<select name="id_cidade">
				<?php 
					require_once 'lista_combo_cidades.php'; 
					echo lista_combo_cidades();
				?>
			</select>
		</div>

		<div class="form-control">
			<input type="submit" value="Enviar">
		</div>
	</form>
	<a href="index.php">Voltar para uma lista</a>
</body>
</html>