<?php 

/**
 * 
 */
class Evento
{
	private string $nome;
	private string $local;
	private $data;
	private $inicio;
	private $fim;
	private array $palestras;

	function __construct($nome, $local, $data, $inicio, $fim)
	{
		$this->nome = $nome;
		$this->local = $local;
		$this->setData($data);
		$this->setInicio($inicio);
		$this->setFim($fim);
		$this->palestras = [];
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function getPalestras()
	{
		return $this->palestras;
	}

	public function adicionaPalestra(Palestra $palestra)
	{
		$this->palestras[] = $palestra;
	}

	public function setData($data)
	{
		$formato = explode('-', $data);

		if(count($formato) === 3)
		{
			$this->data = $data;
		}
		else
		{
			$this->data = date('d-m-Y');
			return false;
		}

		return true;
	}

	public function setInicio($inicio)
	{
		$formato = explode(':', $inicio);

		if(count($formato) === 3)
		{
			$this->inicio = $inicio;
		}
		else
		{
			return false;
		}

		return true;
	}

	public function setFim($fim)
	{
		$formato = explode(':', $fim);

		if(count($formato) === 3 && date($fim) > date($this->inicio))
		{
			$this->fim = $fim;
		}
		else
		{
			return false;
		}

		return true;
	}
}

