<?php 

$conn = mysqli_connect('localhost', 'root', '', 'php-poo');

mysqli_query($conn, "INSERT INTO famosos (nome) VALUES ('PROGAMANDO COM PADROES DE PROJETO')");
mysqli_query($conn, "INSERT INTO famosos (nome) VALUES ('sistemas de arquivos do linux')");
mysqli_query($conn, "INSERT INTO famosos (nome) VALUES ('linux a biblia')");
mysqli_query($conn, "INSERT INTO famosos (nome) VALUES ('web com ruby')");

mysqli_close($conn);
