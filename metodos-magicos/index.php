<?php 

/**
 * tecnica muito util para classes de gravação em banco de dados pois torna muito mais facil
 * converter os dados do objeto
 */

require_once 'classes/Titulo.php';

$titulo = new Titulo('25/10/2022', 100);
echo "executado o método magico __get: ". $titulo->valor2;
echo "<br>data de vencimento " . $titulo->dt_vencimento;
$titulo->valor = 20;

echo "<br>executado o método magico __get: ". $titulo->valor;



require_once 'classes/TituloDinamic.php';

$tit = new TituloDinamic;

$tit->nome = "Moi´ses da Silva ferreira";
$tit->valor = 200;
$tit->cidade = "olinda";

echo "<br><br>Método vem do array data da classe $tit->valor";

//exucuta o método magico __isset()
if(isset($tit->valor))
{
	echo "<br>Tem essa propiedade";
}
var_dump($tit);

echo "Chamando método __toString"	;
echo "<pre>" . $tit . "</pre>";


//executa o método magico __unset()
unset($tit->valor);

var_dump($tit);