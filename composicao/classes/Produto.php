<?php 
class Produto {

	protected string $descricao;
	protected int $estoque;
	protected float $preco;
	private array $atributos;

	public function __construct(string $descricao, int $estoque, float $preco)
	{
		$this->setDescricao($descricao);
		$this->setPreco($preco);
		$this->setEstoque($estoque);
		$this->atributos = [];
	}

	/**
	 * Método onde acontece a composição do objeto
	 * ele recebe os valores para os atributos do objeto 
	 * e em seguida os instanciam e os adiciona a um array de atributos
	 * depois que o objeto produtor for excluido os atributos tambem serão
	 * na composição os objetos parte só existem enquento o objeto Todo existir
	 * @param  string $nome  [description]
	 * @param  string $valor [description]
	 * @return void
	 */
	public function adicionarAtributo(string $nome, string $valor)
	{
		$this->atributos[] = new Atributo($nome, $valor);
	}

	public function getAtributos()
	{
		return $this->atributos;
	}

	public function aumentarEstoque(int $unidades) : void
	{
		if(is_numeric($unidades) && $unidades >= 0)
		{
			$this->estoque += $unidades;
		}
		
	}

	public function diminuirEstoque(int $unidades) : void
	{
		if(is_numeric($unidades) && $unidades >= 0 )
		{
			$this->estoque += $unidades;
		}
	}

	public function ajustarPreco(float $percentual) : void
	{
		if(is_numeric($percentual) && $percentual >= 0)
		{
			$this->preco *= (1 + ($percentual / 100 ));
		}
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function setDescricao(string $descricao)
	{
		return $this->descricao = $descricao;
	}

	public function getestoque()
	{
		return $this->estoque;
	}

	public function setEstoque(int $estoque)
	{
		return $this->estoque = $estoque;
	}

	public function getPreco()
	{
		return $this->preco;
	}

	public function setPreco(float $preco)
	{
		return $this->preco = $preco;
	}

	public function __destruct()
	{
		echo"<br>Objeto Produto foi excluido<br>";
	}
}