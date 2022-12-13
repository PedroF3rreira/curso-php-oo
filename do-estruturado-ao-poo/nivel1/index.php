<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>listagem de pessoas</title>
</head>
<body>
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
			<?php require 'list_pessoas.php' ?>
		</tbody>
	</table>
	<a href="pessoa_form_insert.php" title="adicionar pessoa">Adicionar</a>
</body>
</html>