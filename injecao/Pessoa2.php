<?php 
require_once 'Record.php';

interface ExportInterface
{
	public function export($data);
}


/**
 * classe que oferece o serviço que a clase pessoa 
 * prescisa utilizar
 * **/
class ExportJson implements ExportInterface
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
	 * para desacoplar minha classe da classe ExportJson
	 * tenho que usar a injeção de dependencia e criar uma interface
	 * que obrigue a classe que quiser oferecer o serviço
	 * para que ela tenha o método (export)
	 * **/
	public function toJson(ExportInterface $service)
	{
	
		return $service->export($this->data);
	}
}

$pessoa = new Pessoa();
$pessoa->nome = "pedro daiel";
$pessoa->idade = 29;
$pessoa->endereco = "Rua 8 de maio";
echo $pessoa->toJson( new ExportJson );

/**
 * padão tambem é conhecido como inverção de controle pois bota o poder
 * na mão de quem esta chamando a classe não em quem definiu essa classe
 * **/