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
				'title' => 'lista pessoas'
		]);
	}

	public function saveJson()
	{
		$pessoas = (new Pessoa)->load();
		$this->allToJson(time().'pessoa', $pessoas);
	}

	public function saveXML()
	{
		$pessoas = (new Pessoa)->load();
		
		$this->allToXML(time().'pessoa', $pessoas);
		
		header('location: http://localhost/curso-php-oo/exercicio_modulo4/');
	}
}


