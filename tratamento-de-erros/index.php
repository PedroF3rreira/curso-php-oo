<?php 

require_once 'classes/CSVParse.php';

try
{
	$csv = new CSVParse('produtos.csv', ';');
	echo $csv->parse();

	while($row = $csv->fetch())
	{	
		echo "<pre>";
			var_dump($row)	;
		echo "</pre>";
	}
}
catch(Exception $e)
{
	echo "Um erro ocorreu: ".$e->getMessage();
}
