<?php 

/**
 * 			
 */
class Pessoa
{	
	private $nome;
	private $genero;
	private $id;
	private static $contador;
	private const GENEROS = ['M' => 'masculino', 'F' => 'feminino'];//constante de classe
	
	function __construct($nome, $genero)
	{
		self::$contador += 1;

		$this->nome = $nome;
		$this->genero = $genero;
		$this->id = self::$contador;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function getNomeGenero()
	{
		return self::GENEROS[$this->genero];
	}

	//método static é um método de classe
	public static function getNumberInstances()
	{
		return self::$contador;
	}
}

$p1 = new Pessoa('Marivalda', 'F');
$p2 = new Pessoa('Marcos', 'M');
//constantes de classe poodem ser acessados de qualquer lugar da aplicação com esse sintaxe
//$genero = Pessoa::GENERO['M'];

//print $genero;

echo"<br>Nome:{$p1->getNome()} == Sexo: {$p1->getNomeGenero()}<br>";
echo"<br>Nome:{$p2->getNome()} == Sexo: {$p2->getNomeGenero()}<br>";

echo "<br>pegando valor da variavel de classe atraves do método estático da classe <br>";
echo "Instancias da classe pessoa ".Pessoa::getNumberInstances();
