<?php 

/**
 * 
 */
class ContaCorrente extends Conta
{
	protected float $limite;

	public function __construct(float $saldo, string $conta, string $agencia, float $limite)
	{
		//usado quando a classe filha quer adicionar algum atributo na inicialização da classe
		//chamamos o parente para usar o construtor da classe pai dentro do construutor da classe filha
		parent::__construct($saldo, $agencia, $conta);

		$this->limite = $limite;
	}

	public function retirar(float $valor)
	{
		if(($this->saldo + $this->limite) >= $valor)
		{
			$this->saldo -= $valor;
			echo "saldo: $this->saldo";
		}
		else{
			echo "Voce passou do limite permitido";
			return false;
		}

		return true;
	}
}