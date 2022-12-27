<?php 

class Record
{
	protected $data;

	public function __set($prop, $value)
	{
		$this->data[$prop] = $value;
	}

	public function __get($prop)
	{
		return $this->data[$prop];
	}

	public function save()
	{
		return "INSERT INTO ". $this::TABLENAME ." (".implode(',', array_keys($this->data)) . ") 
				VALUES ". "(" . implode(',', array_values($this->data)) . ")"; 
	}
}

class Produto extends Record
{
	const TABLENAME = 'products';
}

$p = new Produto;
$p->decription = 'Copo de águas';
$p->price = 5.69;
$p->size = 1.69;
$p->wight = 25;

$rf = new ReflectionProperty('Produto', 'data');

var_dump($p);

var_dump($p->save());

var_dump($rf->getValue($p));