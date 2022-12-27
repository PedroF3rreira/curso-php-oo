<?php 
class Veiculo
{
	protected $ano;
	protected $cor;
	protected $marca;
	protected $parts;

	public function getMarca()
	{
		
	}

	public function setMarca($marca)
	{
		
	}
}

class Automovel extends Veiculo
{
	
	public const RODAS = 4;
	private $placa;

	public function setPlaca($placa)
	{
		
	}
	
}