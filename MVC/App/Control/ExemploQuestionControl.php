<?php 
use Livro\Widgets\Dialog\Question;
use Livro\Control\BaseControl;
use Livro\Control\Action;

class ExemploQuestionControl extends BaseControl
{
	public function __construct()
	{
		parent::__construct();
		$action1 = new Action( [$this, 'onConfirma'] );
		$action2 = new Action( [$this, 'onNega'] );
		$quest = new Question('Deseja continuar', $action1, $action2);
	}

	public function onConfirma()
	{
		echo "Confirmou";
	}

	public function onNega()
	{
		echo "Negou";
	}
}