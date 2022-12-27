<?php 
require_once 'Veiculo.php';

$rm = new ReflectionMethod('Automovel', 'setPlaca');

echo "Nome do Método " . $rm->getName() . "<br>";

echo $rm->isPublic() ? "Método é publico" : "Nãe é publico" . "<br>";

