<?php 
require_once 'Record.php';

/**
 * classe que oferece o serviço que a clase pessoa 
 * prescisa utilizar
 * **/
class ExportJson
{
	
	public function export($data)
	{
		return json_encode($data);
	}
}



class Pessoa extends Record
{
	const TABLENAME = 'pessoas';

	/**
	 * utilizando a classe exportJson dessa maneira estou acoplando
	 * minha classe fortemente a classe de exportação
	 * pois mesmo se casa uma bibioteca melhor aparecer não poderei alterar 
	 * a classe
	 * **/
	public function toJson()
	{
		$exp = new ExportJson;
		return $exp->export($this->data);
	}
}

$pessoa = new Pessoa();
$pessoa->nome = "pedro daiel";
$pessoa->idade = 29;
$pessoa->endereco = "Rua 8 de maio";
echo $pessoa->toJson();