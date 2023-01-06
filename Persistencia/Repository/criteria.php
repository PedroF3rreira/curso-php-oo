<?php 

require_once 'classes/Criteria.php';

$criteria = new Criteria;
$criteria->add('idade', '<', 25);
$criteria->add('idade', '>=', 10,'or');

$criteria2 = new Criteria;
$criteria2->add('idade', 'in', array(10,3,5));

echo $criteria->dump()."<br>";
echo $criteria2->dump();