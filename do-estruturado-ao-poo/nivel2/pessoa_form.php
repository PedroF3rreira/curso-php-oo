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
		if(!empty($_REQUEST['action']))
		{
			if( $_REQUEST['action'] == 'edit')
			{
				if(!empty($_GET['id']))
				{
					$result = mysqli_query($conn, 
						"SELECT pessoas.*, cidades.nome as nome_cidade FROM pessoas 
						INNER JOIN cidades ON pessoas.id_cidade=cidades.id 
						WHERE pessoas.id = '{$_GET['id']}' ");

					$row = mysqli_fetch_assoc($result);

					$id 		= 	$row['id'];
					$nome 		= 	$row['nome'];
					$endereco 	= 	$row['endereco'];
					$bairro 	=	$row['bairro'];
					$telefone 	= 	$row['telefone'];
					$email 		= 	$row['email'];
					$id_cidade  = 	$row['id_cidade'];

				}

			}
			else if($_REQUEST['action'] == 'save')
			{
				$id 		= $_POST['id'];
				$nome 		= $_POST['nome'];
				$endereco 	= $_POST['endereco'];
				$bairro 	= $_POST['bairro'];
				$telefone 	= $_POST['telefone'];
				$email 		= $_POST['email'];
				$id_cidade 	= $_POST['id_cidade'];
				
				if(!empty($id))
				{
					$result = mysqli_query($conn, "UPDATE pessoas SET 
						nome 		= '$nome',
						endereco 	= '$endereco',
						bairro 		= '$bairro',
						telefone 	= '$telefone',
						email 		= '$email',
						id_cidade 	= '$id_cidade'
					WHERE id = $id");

					if($result)
					{
						echo "Editado com suscesso!";
					}
				}
				else
				{
					$sql = "INSERT INTO pessoas (nome, endereco, bairro, telefone, email, id_cidade)
					VALUES ('{$nome}', '{$endereco}', '{$bairro}', '{$telefone}', '{$email}', '{$id_cidade}')";

					$result = mysqli_query($conn, $sql);

					if($result)
					{
						echo "registro adicionado com suscesso";
					}
				}
			}

		}
		
	 ?>
	<form action="pessoa_form.php?action=save" method="POST" enctype="multipart/form-data">
		<div class="form-control">
			<label>Codígo:</label>
			<input type="text" name="id" readonly="1" value="<?=$id ?? '' ?>">
		</div>

		<div class="form-control">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?=$nome ?? '' ?>">
		</div>

		<div class="form-control">
			<label>Endereço:</label>
			<input type="text" name="endereco" value="<?=$endereco ?? '' ?>">
		</div>

		<div class="form-control">
			<label>Bairro:</label>
			<input type="text" name="bairro" value="<?=$bairro ?? '' ?>">
		</div>
		
		<div class="form-control">
			<label>Telefone:</label>
			<input type="text" name="telefone" value="<?=$telefone ?? ''?>">
		</div>

		<div class="form-control">
			<label>Email:</label>
			<input type="text" name="email" value="<?=$email ?? ''?>">
		</div>

		<div class="form-control">
			<label>Cidades:</label>
			<select name="id_cidade">
				<?php 
					$result = mysqli_query($conn, "SELECT * FROM cidades");

					while($row = mysqli_fetch_assoc($result))
					{	
						$check = '';
					
						if(!empty($id_cidade))
						{
							$row['id'] == $id_cidade ? $check='selected' : '';
						}
						
						echo"<option {$check} value={$row['id']}>{$row['nome']}</option>";
					}

					mysqli_close($conn);
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