<?php 
use Livro\Control\Action;
use Livro\Control\BaseControl;

class ExemploActionControl extends BaseControl
{
	public function __construct()
	{
		parent::__construct();

		$action = new Action([$this, 'onAction']);
		$action->setParameter('nome', 'Pedro Daniel');

		print $action->serialize();

	}

	public function onAction()
	{
		
	}
}