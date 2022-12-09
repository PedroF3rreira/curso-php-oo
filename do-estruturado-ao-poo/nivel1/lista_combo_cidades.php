<?php 

function lista_combo_cidades()
{
	try {
		$conn = new PDO('mysql:host=localhost;dbname=livro', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

		$result = $conn->query("SELECT * FROM cidade");

		$output = '';

		if($result)
		{	
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$id = $row['id'];
				$nome = $row['nome'];

				$output .= "<option value={'$id'}> {$nome} </option>";
			}
		}

		$conn = null;

		return $output;

	} catch (PDOException $e) {
		echo "error ".$e->getMessage();
	}
	
}
