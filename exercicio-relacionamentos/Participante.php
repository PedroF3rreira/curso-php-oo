<?php 

/**
 * 
 */
class Participante
{
	protected $nome;
	protected $fone;
	protected $endereco;
	protected $email;
	protected array $eventos;
	protected array $palestras;
	
	function __construct($nome, $fone, $endereco, $email)
	{
		$this->nome = $nome;
		$this->fone = $fone;
		$this->endereco = $endereco;
		$this->email = $email;
		$this->eventos = [];
		$this->palestras = [];
	}

	public function inscreveEvento(Evento $evento)
	{
		$this->eventos[] = $evento;
	}
	public  function inscrevePalestra(Palestra $palestra)
	{
		
		foreach($this->eventos as $evento)
		{
			if(in_array($palestra, $evento->getPalestras()))
			{
				echo "Inscrito O evento {$evento->getNome()} têm {$palestra->getNome()}<br>";
				$this->palestras[] = $palestra;
			}
			else
			{
				echo "O evento {$evento->getNome()} não tem essa palestra<br>";
			}
		}

		
	}
}