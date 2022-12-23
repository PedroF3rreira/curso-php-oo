<?php 

class Titulo
{
	private $dt_vencimento;
	private $valor;

	public function __construct($dt_vencimento, $valor)
	{
		$this->dt_vencimento = $dt_vencimento;
		$this->valor = $valor;
	}

	/**
	 * método intercepita tentativas de acesso a uma propiedade do objeto
	 */

	public function __get($propiedade)
	{
		$prop_names = get_object_vars($this);

		foreach($prop_names as $key => $value)
		{
			if($propiedade == $key)
			{
				return $this->$propiedade;
			}
			
		}
		
	}

	/**
	 * método intercepita tentativas de alteração de propiedades do objeto
	 */
	public function __set($propiedade, $value)
	{
		if($propiedade == 'valor' && $value > 0)
		{
			$this->$propiedade = $value;
		}
	}
}