<?php 

/**
 * 	
 */
class Cesta
{
	private $time;
	private array $produtos;
	
	function __construct()
	{
		$this->time = date('d-m-Y h:i:s');
		$this->produtos = [];
	}

	public function getTime()
	{
		return $this->time;
	}

	/**
	 * Método onde acontece a agregação de objeto
	 * diferente da composição nos recebemos o objeto já pronto
	 * não prescisamos instanciar esse objeto
	 * é diferente da composição depois de excluir a cestas os
	 * objetos produtos vão continuar em memoria
	 * @param  Produto $produto [description]
	 * @return [type]           [description]
	 */
	public function adicionarProduto(Produto $produto)
	{
		$this->produtos[] = $produto;
	}

	public function getProdutos()
	{
		return $this->produtos;
	}

	public function __destruct()
	{
		echo "<br>Objeto Cesta foi escluido<br>";
	}

}