<?php 

$data = ['arroz', 'feijão', 'macarrão','fuba'];
$arrayObject = new ArrayObject($data);

echo "pegando valor pelo indice : ";
echo $arrayObject->offsetGet(2);

echo "<br>alterando valor pelo indice : ";
echo $arrayObject->offsetSet(2, 'Hanburgue');

echo "<br>deletando valor  pelo indice : ";
echo $arrayObject->offsetUnset(3);

echo "<br>tamanho do array : ";
echo $arrayObject->count();

echo "<br>testando se posição existe : ";
echo $arrayObject->offsetExists(1);

$arrayObject[] = 'Peito frango';

$arrayObject->natSort();

echo "<pre>".$arrayObject->serialize();

foreach($arrayObject as $item)
{
	echo "<br>".$item;
}