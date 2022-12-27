<?php 

require_once 'Veiculo.php';

$rc = new ReflectionClass('Automovel');

var_dump($rc->getMethods());
var_dump($rc->getProperties());
var_dump($rc->getParentClass());
var_dump($rc->getConstants());


echo "Método propiedades: ";
foreach($rc->getMethods() as $methods)
{
	var_dump($methods->getParameters());
}