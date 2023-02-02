<?php 

use Livro\Control\BaseControl;
use Livro\Control\Action;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Wrapper\BootstrapFormWrapper;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Combo;
use Livro\Widgets\Form\Text;
use Livro\Widgets\Dialog\Message;

class ContatoForm extends BaseControl
{

	private $form;

	/**
	 * cria e exibe o formulário na tela 
	 * **/
	public function __construct()
	{
		parent::__construct();
		$this->class = 'container';

		$this->form = new BootstrapFormWrapper(new Form('contato'));
		$this->form->setTitle("Formulário de Contato");
		
		$nome = new Entry('nome');
		$email = new Entry('email');
		$conteudo = new Text('conteudo');
		
		$assunto = new Combo('assunto');
		$assunto->addItems([
			'1' => 'Suporte',
			'2' => 'Fatura',
			'3' => 'autros'
		]);

		$conteudo->setSize(300, 80);

		$this->form->addField('Nome:', $nome);
		$this->form->addField('Email:', $email);
		$this->form->addField('Assunto:', $assunto, '15%');
		$this->form->addField('Conteúdo:', $conteudo, '600');

		$this->form->addAction( 'Enviar', new Action([$this, 'onSend']) );
		$this->form->addAction( 'Salvar', new Action([$this, 'onSave']) );

		parent::add($this->form);

		$this->onLoad();
	}

	public function onSave()
	{
		
	}
	
	public function onSend($params)
	{
		$data = $this->form->getData();
		$this->form->setData($data);
		var_dump($data);
		try
		{
			if(empty($data->email))
			{
				throw new Exception("Email vazio campo obrigatório");
			}

			if(empty($data->conteudo))
			{
				throw new Exception("campo conteudo vazio campo obrigatório");	
			}	
		}
		catch(Exception $e)
		{
			new Message('error', $e->getMessage());
		}
	}

	public function onLoad()
	{
		$data = new StdClass;
		$data->assunto = 1;
		$this->form->setData($data);
	}
}