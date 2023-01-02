<?php 
require_once 'ProdutoGateway.php';
/**
 * classe dominio responsavel por representar a entidade produto
 * no sistema
 */
class Produto
{
	private $data;

	public static function setConnection(PDO $conn)
	{
		ProdutoGateway::setConnection( $conn );
	}

	public function __set($prop, $value)
	{
		$this->data[$prop] = $value;
	}

	public function __get($prop)
	{
		return $this->data[$prop];
	}

	public static function find($id)
	{
		$pgw = new ProdutoGateway;
		return $pgw->find($id, 'Produto');
	}

	public static function all($filter = '')
	{
		$pgw = new ProdutoGateway;
		return $pgw->all($filter, 'Produto');
	}

	public function delete()
	{
		$pgw = new ProdutoGateway;
		return $pgw->delete($this->id);
	}

	public function save()
	{
		$pgw = new ProdutoGateway;
		return $pgw->save( (object) $this->data);
	}

	public function getMargemLucro()
	{
		return (($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
	}

	public function registrarCompra($custo, $quantidade)
	{
		$this->preco_custo = $custo;
		$this->estoque += $quantidade;
	}
}