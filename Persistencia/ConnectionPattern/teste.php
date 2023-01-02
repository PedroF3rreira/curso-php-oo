<?php 

require_once 'api/Connection.php';
require_once '../ActiveRecord/classes/Produto.php';

try
{
	$conn = Connection::open('estoque');

	Produto::setConnection($conn);

	$p = new Produto;
	$p->descricao = "novo carro amarelo";
	$p->estoque = 10;
	$p->preco_custo = 10.66;
	$p->preco_venda = 20.89;
	$p->codigo_barras = 'cdfwsef4r96g48er4';
	$p->data_cadastro = date('Y-m-d');
	$p->origem = 'n';
	//$p->save();
	$p2 = Produto::find(1);
	$p2->descricao = 'Carro controle remoto';
	$p2->save();

}
catch(Exception $e)
{
	echo $e->getMessage();
}
