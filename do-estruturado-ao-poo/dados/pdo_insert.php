<?php 
try{
	$conn = new PDO('mysql:host=localhost;dbname=php-poo;', 'root', '');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$conn->exec("INSERT INTO famososs (nome) VALUES ('sistemas legados')");
	$conn->exec("INSERT INTO famosos (nome) VALUES ('estrutura de dados')");

	$conn = null;
}
catch(PDOExecption $e)
{
	header('location:mysql_list.php');
}

