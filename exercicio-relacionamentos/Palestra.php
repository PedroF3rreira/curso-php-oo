<?php 

/**
 * 
 */
class Palestra
{
	private $nome;
	private $data;
	private $turno;
	private const TURNO = ['M' => 'manhã', 'T' => 'tarde', 'N' => 'noite'];
	private int $duracao;
	private $tema;
	private $sala;
	private Ministro $ministro;

	function __construct(
		string $nome, 
		string $data, 
		string $turno, 
		int $duracao, 
		string $tema, 
		string $sala, 
		Ministro $ministro)
	{
		$this->nome = $nome;
		$this->setData($data);
		$this->setTurno($turno);
		$this->duracao = $duracao;
		$this->tema = $tema;
		$this->sala = $sala;
		$this->setMinistro($ministro);
	}
	public function getNome()
	{
		return $this->nome;
	}
	
	public function getDuracao()
	{
		return $this->duracao;
	}

	public function setDuracao(int $duracao)
	{
		$this->duracao = $duracao > 0 ? $duracao : 0;
	}

	public function setTurno($turno)
	{
		if(in_array(strtoupper($turno), array_keys(self::TURNO)))
		{
			$this->turno = $turno;
		}
		else
		{
			return false;
		}

		return true;
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

	public function setMinistro(Ministro $ministro)
	{
		$this->ministro = $ministro;
	}
}