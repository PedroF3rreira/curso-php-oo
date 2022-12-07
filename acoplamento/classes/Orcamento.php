<?php 

/**
 * 	
 */
class Orcamento
{
	private array $itens;
	
	function __construct()
	{
		$this->itens = [];
	}
	//Versão acoplada do método onde estava totalmente acoplada com classe Produto
	//public function adicionarItem(Produto $item, int $qtd)
	//
	//desacoplando classe orcamento da classe produto atraves de uma interface 
	//criamos uma interface para garantir que nossa classe passada tenha a implementação do
	//método getPreco e getDescricao que são utilizadas na classe orcamento
	public function adicionarItem(OrcavelInterface $item, int $qtd)
	{
		$this->itens[] = [$qtd, $item];
	}

	public function total()
	{
		$total = 0;

		foreach($this->itens as $item)
		{
			$total += ($item[0] * $item[1]->getPreco());
		}

		return $total;
	}

	public function getItens()
	{
		return $this->itens;
	}
}