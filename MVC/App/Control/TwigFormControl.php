<?php 
use Livro\Control\BaseControl;

class TwigFormControl extends BaseControl
{
	public function __construct()
	{
		$loader = new \Twig\Loader\FilesystemLoader('App/Resource');
		$twig = new \Twig\Environment($loader);

		echo $twig->render('forms/form.html', ['title' => 'teste Twig']);
	}
}