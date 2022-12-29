<?php 
namespace App\Models;
use App\Database\Record;

class Pessoa extends Record
{
	const TABLENAME = 'pessoas';

	public function allToJson()
	{
		$data = $this->load();
		file_put_contents('pessoa.json',json_encode($data));
	}

	public function allToXml()
	{
		
	}
}