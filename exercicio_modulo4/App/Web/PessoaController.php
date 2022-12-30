<?php 
namespace App\Web;

use App\Models\Pessoa;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PessoaController
{
	use \App\Traits\ObjectConvert;

	private $twig;

	public function __construct()
	{
		$loader = new FilesystemLoader(__DIR__ . '../../templates');
		$this->twig = new Environment($loader);
	}
	
	public function listPessoa()
	{	
		$pessoas = (new Pessoa)->load();
		
		echo $this->twig->render('pessoas/list.html.twig',[
				'pessoas' => $pessoas,
				'title' => 'lista pessoas do banco'
		]);
	}

	public function saveJson()
	{
		$pessoas = (new Pessoa)->load();
		$this->allToJson('pessoa', $pessoas);
		header('location: http://localhost/progamacao-php-oo-pablo/exercicio_modulo4/');
	}

	public function saveXML()
	{
		$pessoas = (new Pessoa)->load();
		
		$this->allToXML('pessoa', $pessoas);
		
		header('location: http://localhost/progamacao-php-oo-pablo/exercicio_modulo4/');
	}

	public function loadJson()
	{
		$pessoas = [];
		$string = file_get_contents('pessoa.json');
		$items = json_decode($string);

		foreach($items as $pessoa)
		{
			$data['id'] = $pessoa->id;
			$data['endereco'] = $pessoa->endereco;
			$data['nome'] = $pessoa->nome;

			$pessoas[] = $data;
		}

		echo $this->twig->render('pessoas/list.html.twig', 
			[
				'pessoas' => $pessoas,
				'title' => 'lista pessoas do arquivo json'
			]
		);
	}

	public function loadXML()
	{
		$pessoas = [];
		
		$xml = new \DOMDocument();
		$xml->load('pessoa.xml');
		$items = $xml->getElementsByTagName('pessoa');
		
		foreach($items as $pessoa)
		{
			$data['nome'] = $pessoa->getElementsByTagName('nome')->item(0)->nodeValue;
			$data['endereco'] = $pessoa->getElementsByTagName('endereco')->item(0)->nodeValue;
			$pessoas[] = $data;
		}

		echo $this->twig->render('pessoas/list.html.twig', 
			[
				'pessoas' => $pessoas,
				'title' => 'lista pessoas do arquivo xml'
			]
		);	
	}
}


