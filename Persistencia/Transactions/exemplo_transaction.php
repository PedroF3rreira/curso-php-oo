<?php 
require_once 'classes/Produto.php';
require_once 'api/Connection.php';
require_once 'api/Transaction.php';

try
{
	Transaction::open( 'estoque' );	

	$p = new Produto;
	$p->descricao = "segundo Produto de teste transaction";
	$p->estoque = 10;
	$p->preco_custo = 15.66;
	$p->preco_venda = 35.89;
	$p->codigo_barras = 'cdfwsef4r96g48er4';
	$p->data_cadastro = date('Y-m-d');
	$p->origem = 'C';
	$p->save();
	$p2 = Produto::find(1);
	$p2->descricao = 'Carro controle remoto';
	//$p2->save();
	
	Transaction::close();

}
catch(Exception $e)
{
	Transaction::rollback();
	echo $e->getMessage();
}
