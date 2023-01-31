<?php 

use Livro\Control\BaseControl;
use Livro\Control\Action;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Wrapper\BootstrapFormWrapper;
use Livro\Widgets\Form\Entry;

class ContatoForm extends BaseControl
{

	private $form;

	public function __construct()
	{
		parent::__construct();

		$this->form = new BootstrapFormWrapper(new Form('contato'));
		$this->form->setTitle("Formulário de Contato");
		
		$entry = new Entry('nome');
		$entry2 = new Entry('Cidade');
		
		$this->form->addField('Nome:', $entry);
		$this->form->addField('Cidade:', $entry2);

		$this->form->addAction( 'Enviar', new Action([$this, 'onSend']) );

		parent::add($this->form);

	}

	public function onSend()
	{
		// code...
	}
}