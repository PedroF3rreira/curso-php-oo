<?php 

require_once 'Preferences.php';

$p = Preferences::getInstance();

echo $p->getData('lenguage');

$p->setData('lenguage','en-US');

$p2 = Preferences::getInstance();
echo "<br>".$p2->getData('lenguage');
