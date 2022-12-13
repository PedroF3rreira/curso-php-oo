<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Pessoa form insert</title>
</head>
<?php 

	if(!empty($_GET['id']))
	{
		$id = $_GET['id'];
		$conn = mysqli_connect('localhost', 'root', '', 'livro');

		$sql = "SELECT * FROM pessoas WHERE id=$id";

		$result = mysqli_query($conn, $sql);

		$row = mysqli_fetch_assoc($result);

		$nome = $row['nome'];
		$endereco = $row['endereco'];
		$bairro = $row['bairro'];
		$telefone = $row['telefone'];
		$email = $row['email'];
		$id_cidade = $row['id_cidade'];
		
	}	
 ?>
<body>
	<form action="pessoa_editar.php" method="POST" enctype="multipart/form-data">
		<div class="form-control">
			<label>Codígo:</label>
			<input type="text" name="id" readonly="1" value="<?=$id?>">
		</div>

		<div class="form-control">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?=$nome?>">
		</div>

		<div class="form-control">
			<label>Endereço:</label>
			<input type="text" name="endereco" value="<?=$endereco?>">
		</div>

		<div class="form-control">
			<label>Bairro:</label>
			<input type="text" name="bairro" value="<?=$bairro?>">
		</div>
		
		<div class="form-control">
			<label>Telefone:</label>
			<input type="text" name="telefone" value="<?=$telefone?>">
		</div>

		<div class="form-control">
			<label>Email:</label>
			<input type="text" name="email" value="<?=$email?>">
		</div>

		<div class="form-control">
			<label>Cidades:</label>
			<select name="id_cidade">
				<?php 
					require_once 'lista_combo_cidades.php'; 
					echo lista_combo_cidades($id_cidade);
				?>
			</select>
		</div>

		<div class="form-control">
			<input type="submit" value="Editar">
		</div>
	</form>
</body>
