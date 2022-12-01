<?php 


class ContaPoupanca extends Conta
{
	
	public function retirar(float $valor)
	{
		if($this->saldo >= $valor)
		{
			$this->saldo -= $valor;
			$this->exibeSaldo();
		}
	}

	public function exibeSaldo()
	{
		echo"Saldo atual: {$this->getSaldo()}";
	}
	
}