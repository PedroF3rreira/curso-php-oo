<?php 
namespace App\Web;

use App\Models\Pessoa;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PessoaController
{
	private $twig;

	public function __construct()
	{
		$loader = new FilesystemLoader(__DIR__ . '../../templates');
		$this->twig = new Environment($loader);
	}
	public function listPessoa()
	{	
		$pessoas = (new Pessoa)->load();

		echo $this->twig->render('list.html.twig',[
				'pessoas' => $pessoas
		]);
	}
}


