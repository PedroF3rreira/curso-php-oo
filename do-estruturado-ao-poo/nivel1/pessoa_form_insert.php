<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Pessoa form insert</title>
</head>
<body>
	<form action="pessoa_save_insert.php" method="POST" enctype="multipart/form-data">
		<div class="form-control">
			<label>Codígo:</label>
			<input type="text" name="id" readonly="1">
		</div>

		<div class="form-control">
			<label>Nome:</label>
			<input type="text" name="nome" >
		</div>

		<div class="form-control">
			<label>Endereço:</label>
			<input type="text" name="endereco" >
		</div>

		<div class="form-control">
			<label>Bairro:</label>
			<input type="text" name="bairro">
		</div>
		
		<div class="form-control">
			<label>Telefone:</label>
			<input type="text" name="telefone">
		</div>

		<div class="form-control">
			<label>Email:</label>
			<input type="text" name="email">
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
</body>
</html>