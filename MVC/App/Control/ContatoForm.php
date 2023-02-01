<?php 

use Livro\Control\BaseControl;
use Livro\Control\Action;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Wrapper\BootstrapFormWrapper;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Combo;
use Livro\Widgets\Dialog\Message;

class ContatoForm extends BaseControl
{

	private $form;

	public function __construct()
	{
		parent::__construct();
		$this->class = 'container';

		$this->form = new BootstrapFormWrapper(new Form('contato'));
		$this->form->setTitle("Formulário de Contato");
		
		$nome = new Entry('nome');
		$email = new Entry('email');
		
		$assunto = new Combo('assunto');
		$assunto->addItems([
			'1' => 'Suporte',
			'2' => 'Fatura',
			'3' => 'autros'
		]);


		$this->form->addField('Nome:', $nome);
		$this->form->addField('Email:', $email);
		$this->form->addField('Assunto:', $assunto, '35%');

		$this->form->addAction( 'Enviar', new Action([$this, 'onSend']) );

		parent::add($this->form);
	}

	public function onSend($params)
	{
		$data = $this->form->getData();
		var_dump($data);
		try
		{
			if(empty($data->email))
			{
				throw new Exception("Email vazio campo obrigatório");
			}	
		}
		catch(Exception $e)
		{
			new Message('error', $e->getMessage());
		}
	}
}