<?php 
use Livro\Control\BaseControl;
use Livro\Database\Transaction;
use Livro\Database\Criteria;
use Livro\Database\Repository;

class TwigFormControl extends BaseControl
{
	private $twig;

	public function __construct()
	{
		parent::__construct();

		$loader = new \Twig\Loader\FilesystemLoader('App/Resource');
		$this->twig = new \Twig\Environment($loader);
	}

	public function index()
	{
		try
		{
			Transaction::open('livro');

			$criteria = new Criteria();
			$criteria->setProperty('order', 'id');
			$repository = new Repository('Pessoa');
			$pessoas = $repository->load($criteria);
			
			Transaction::close();

			echo $this->twig->render('index.html.twig', 
				[
					'title' => 'teste Twig',
					'pessoas' => $pessoas,
					'columns' => array_keys($pessoas[0]->toArray())
				]);
		}
		catch(Exception $e)
		{
			Transaction::rollback();
			echo $e->getMessage();
		}
	}
}