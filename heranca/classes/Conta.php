<?php 
/**
 * tipo de operação especialização
 * se uma classe tiver au menos um método abstrato a classe deve ser abstrata
 * **/
abstract class Conta
{
	protected float $saldo;
	protected string $agencia;
	protected string $conta;
	
	function __construct(float $saldo, string $agencia, string $conta)
	{
		$this->saldo = $saldo > 0 ? $saldo : 0;
		$this->agencia = $agencia;
		$this->conta = $conta;
	}

	public function depositar($valor)
	{
		$this->saldo += $valor > 0 ? $valor : 0;
	}

	public function getSaldo()
	{
		return $this->saldo;
	}

	public abstract function retirar(float $valor);
	

}