<?php 

require_once 'Veiculo.php';

$rp = new ReflectionProperty('Automovel', 'placa');

echo "propiedade é publica " . $rp->isPublic();
echo  "<br>propiedade é privada" . $rp->isPrivate();