<?php 

require_once "classes/Produto.php";
require_once "classes/Connection.php";

try {
	
	Produto::setConnection(Connection::getInstance());
	
	var_dump(Produto::all());

	$p = new Produto;
	$p->descricao = 'Carro vermelho de controle';
	$p->estoque = 258;
	$p->preco_custo = 25.98;
	$p->preco_venda = 65.98;
	$p->codigo_barras = '12151x6165x1s651c651c6as5';
	$p->data_cadastro = date('Y-m-d');
	$p->origem = 'P';
	//$p->save();
	

	$p2 = Produto::find(1);
	$p2->descricao = 'Alterado a descricao';
	$p2->save();

	// $pdelete = Produto::find(2);
	// $pdelete->delete();
	$carro = Produto::find(6);
	echo "Descrição: ".$carro->descricao."<br>";
	echo "Margem de lucro: ".$carro->getMargemLucro()."<br>";
	$carro->registrarCompra(10.69, 100);

	$carro->save();

} catch (Exception $e) {
	echo $e->getMessage();
}
