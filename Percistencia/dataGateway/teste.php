<?php 

require 'classes/ProdutoGateway.php';

try
{
	$pdo = new PDO('mysql:dbname=livro;host=localhost;', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	ProdutoGateway::setConnection($pdo);

	/*
	$data = new stdClass;
	$data->descricao = 'vinho';
	$data->estoque = 2;
	$data->preco_custo = 23;
	$data->preco_venda = 12.69;
	$data->codigo_barras = "154165198456191";
	$data->data_cadastro = date('Y-m-d');
	$data->origem = 'N';

	$pg = new ProdutoGateway();
	$pg->save($data);
	*/

	$pg = new ProdutoGateway();
	$produto = $pg->find(1);
	$produto->estoque += 5;
	$pg->save($produto);
}	
catch(Exception $e)
{

}