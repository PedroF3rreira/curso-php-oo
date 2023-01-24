<?php
use Livro\Widgets\Dialog\Message;
use Livro\Control\BaseControl;

class ExemploDialogControl  extends BaseControl
{
	public function __construct()
	{
		parent::__construct();

		$m1 = new Message('info', 'Uma menssagem de informação do sistema');
		$m2 = new Message('error', 'Um erro ocorreu!');
	}
}