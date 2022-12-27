<?php 
require_once 'record.php';


class Produto extends Record
{
	use ObjectConvert;

	const TABLENAME = 'products';
}

$p = new Produto;
$p->id = 1;
$p->description = "Pa tramontina";
$p->price = 16.69;
$p->stock = 20;
echo $p->save()."<br>";
echo $p->delete()."<br>";
echo $p->load()."<br>";

echo $p->toXML();
echo $p->toJson();

trait ObjectConvert
{
	public function toXml()
	{
		$sp = new SimpleXMLElement('<'.get_class($this).' />');
		
		foreach($this->data as $key => $value)
		{
			$sp->addChild($key, $value);
		}

		return $sp->asXML();
	}

	public function toJson()
	{
		return json_encode($this->data);
	}
}