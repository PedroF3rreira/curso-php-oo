<?php
use Livro\Widgets\Dialog\Message;
use Livro\Control\BaseControl;

class ExemploDialogControl  extends BaseControl
{
	public function __construct()
	{
		parent::__construct();

		new Message('info', 'Uma menssagem de informação do sistema');
		new Message('error', 'Um erro ocorreu!');
	}
}