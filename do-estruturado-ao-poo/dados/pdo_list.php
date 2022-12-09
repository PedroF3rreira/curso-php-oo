<?php 
try{
	$conn = new PDO('mysql:host=localhost;dbname=php-poo;', 'root', '');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$result = $conn->query('SELECT * FROM famosos');
	
	if($result)
	{
		//foreach($result as $row)
		while($row = $result->fetch(PDO::FETCH_OBJ))
		{
			echo $row->codigo . " - ".$row->nome."<br>";
		}
	}
	$conn = null;
}
catch(PDOExecption $e)
{
	header('location:mysql_list.php');
}

