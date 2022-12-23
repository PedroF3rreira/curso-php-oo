<?php 

class TituloDinamic
{
	private $data;

	//método interceptar a tentativa de gravar na propiedade pega o nome 
	//define como index do array data e atribue o valoe passado
	public function __set($prop, $value)
	{
		$this->data[$prop] = $value;
	}

	//método interceptar a tentativa de pegar valor da propiedade
	//usa nome passado para pegar método do array data que contem um indice com o nome da prop
	public function __get($prop)
	{
		return $this->data[$prop];
	}

	//método e chamado quando tentamos chamar á função isset() na propiedade 
	//da objeto
	public function __isset($prop)
	{
		return isset($this->data[$prop]);
	}

	//método e chamado quando tentamos chamar á função unset() na propiedade 
	public function __unset($prop)
	{
		unset($this->data[$prop]);
	}

	//método é chamado quando usuario tenta dar ptint ou echo no objeto
	//se ele não estiver definido da um erro
	//define como objeto vai ser representado numa operação como string
	public function __toString()
	{
		return json_encode($this->data);
	}
}

