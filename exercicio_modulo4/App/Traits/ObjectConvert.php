<?php 
namespace App\Traits;

trait ObjectConvert
{
	public function allToJson($filename, array $data)
	{
		$result = json_encode($data);
		file_put_contents($filename.'.json', $result);
	}

	public function allToXML($filename, array $data)
	{
		$xml = new \DOMDocument('1.0', 'UTF-8');
		$xml->formatOutput = true;	
		$pessoas = $xml->createElement('pessoas');
		$xml->appendChild($pessoas);

		foreach($data as $item)
		{
			$pessoa = $xml->createElement('pessoa');
			$pessoas->appendChild($pessoa);

			$pessoa->appendChild($xml->createElement('nome', $item['nome']));
			$pessoa->appendChild($xml->createElement('endereco', $item['endereco']));

			if(!$xml->save($filename.'.xml', 1))
			{
				throw new Exception("Não foi possivel salvar arquivo");
			}
		}
	}

}