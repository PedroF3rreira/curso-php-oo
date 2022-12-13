<?php 

function lista_combo_cidades($id_cidade = '')
{
	try {
		$conn = new PDO('mysql:host=localhost;dbname=livro', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

		$result = $conn->query("SELECT * FROM cidades");

		$output = '';

		if($result)
		{	
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$id = $row['id'];
				$nome = $row['nome'];

				$selected = ($id == $id_cidade ? 'selected' : '');

				$output .= "<option {$selected} value='$id'>$nome</option>";
				
			}
		}

		$conn = null;

		return $output;

	} catch (PDOException $e) {
		echo "error ".$e->getMessage();
	}
	
}
