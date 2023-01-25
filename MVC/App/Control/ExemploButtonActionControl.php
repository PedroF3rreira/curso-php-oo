<?php 
use Livro\Control\BaseControl;
use Livro\Control\Action;
use Livro\Widgets\Base\Element;

class ExemploButtonActionControl extends BaseControl
{
	public function __construct()
	{
		parent::__construct();

		$button = new Element('a');
		$button->add('Action');
		$button->class = 'btn btn-success';
		
		$action = new Action([$this, 'onSuccess']);
		$action->setParameter('Id', 10);
		$action->setParameter('nome', 'Pedro');
		$button->href = $action->serialize();

		parent::add($button);
	}

	public function onSuccess($param)
	{
		echo "Ação executada ";
		var_dump($param); 
	}
}