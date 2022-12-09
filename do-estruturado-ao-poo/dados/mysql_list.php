<?php 	
$conn = mysqli_connect('localhost', 'root', '', 'php-poo');

$query = "SELECT * FROM famosos";

$result = mysqli_query($conn , $query);

if($result)
{
	while($row = mysqli_fetch_assoc($result))
	{
		echo "Codigo: ".$row['codigo']."<br>";
		echo "Nome: ".$row['nome']."<br><br>";
	}

}

mysqli_close($conn);