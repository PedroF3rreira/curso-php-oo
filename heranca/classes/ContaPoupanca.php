<?php 

/**
 * não permite que a classe seja extendida
 * **/
final class ContaPoupanca extends Conta
{
	
	public function retirar(float $valor)
	{
		if($this->saldo >= $valor)
		{
			$this->saldo -= $valor;
			$this->exibeSaldo();
		}
		else{
			return false;
		}

		return true;
	}

	public function exibeSaldo()
	{
		echo"Saldo atual: {$this->getSaldo()}";
	}
	
	//polimorfismo método do pai sendo polimorfado pelo filho
	public function depositar($valor)
	{
		parent::depositar($valor);

		$this->saldo -= 1;
	}
}