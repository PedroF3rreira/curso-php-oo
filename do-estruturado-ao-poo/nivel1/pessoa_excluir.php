<?php 


$dados = $_GET;

if($_GET['id'])
{
	$conn = mysqli_connect('localhost', 'root','', 'livro');

	$sql = "DELETE FROM pessoas WHERE id = {$dados['id']}";

	$result = mysqli_query($conn, $sql);
	
	mysqli_close($conn);

	if($result)
	{	
		header('location:index.php');
	}
	else
	{
		echo mysqli_error($conn);
	}

}

