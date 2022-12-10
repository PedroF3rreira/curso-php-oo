<?php 
$dados = $_POST;

$conn = mysqli_connect('localhost', 'root', '', 'livro');

$sql = "INSERT INTO pessoas (nome, endereco, bairro, telefone, email, id_cidade) 
VALUES ('{$dados['nome']}','{$dados['endereco']}','{$dados['bairro']}','{$dados['telefone']}','{$dados['email']}','{$dados['id_cidade']}')";

mysqli_query($conn, $sql);

mysqli_close($conn);

header('location:pessoa_form_insert.php');