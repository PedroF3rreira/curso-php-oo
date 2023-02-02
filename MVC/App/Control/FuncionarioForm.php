<?php 
use Livro\Control\BaseControl;
use Livro\Control\Action;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Wrapper\BootstrapFormWrapper;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Combo;
use Livro\Widgets\Form\CheckGroup;
use Livro\Widgets\Form\RadioGroup;
use Livro\Widgets\Dialog\Message;
use Livro\Database\Transaction;

class FuncionarioForm extends BaseControl
{
	private $form;

	public function __construct()
	{
		parent::__construct();

		$this->form = new BootstrapFormWrapper(new Form('from_funcionarios'));
		$this->form->setTitle('Formulario de Funcionarios');

		$id = new Entry('id');
		$id->setEditable('false');
		$this->form->addField('Id:',$id, 50);

		$nome = new Entry('nome');
		$this->form->addField('Nome:',$nome);

		$endereco = new Entry('endereco');
		$this->form->addField('Endereço:',$endereco, 300);

		$email = new Entry('email');
		$this->form->addField('Email:',$email, 300);

		$departamento = new Combo('departamento');
		$departamento->addItems([
			'1' => 'Vendas',
			'2' => 'Estoque',
			'3' => 'rh',
			'4' => 'gerência'
		]);
		$this->form->addField('Departamento:',$departamento, 200);
		
		$idiomas = new CheckGroup('idiomas');
		$idiomas->addItems([
			'1' => 'Inglês',
			'2' => 'Espanhol',
			'3' => 'Alemão'
		]);
		$idiomas->setLayout('horizontal');
		$this->form->addField('Idiomas:',$idiomas);

		$contratacao = new RadioGroup('contratacao');
		$contratacao->addItems([
			'1' => 'clt',
			'2' => 'pj'
		]);
		$this->form->addField('Contratacao:',$contratacao, 20);

		$data = $this->form->getData();
		
		$this->form->addAction('Cadastrar', new Action([$this, 'singUp']));

		parent::add($this->form);
	}

	public function singUp($params)
	{
		try 
		{
			$data = $this->form->getData();
			
			Transaction::open('livro');

			$funcionario = new Funcionario();
			$funcionario->nome = $data->nome;
			$funcionario->endereco = $data->endereco;
			$funcionario->email = $data->email;
			$funcionario->departamento = $data->departamento;
			$funcionario->idiomas = implode(',',$data->idiomas);
			$funcionario->contratacao = $data->contratacao;
			
			if($data->id)
			{
				$funcionario->id = $data->id;
			}

			if(empty($funcionario->email))
			{	
				$this->form->setData($data);
				throw new Exception("O campo email é obrigatório");
			}	
			
			$id = $funcionario->store();
			
			$data->id??$id;

			$this->form->setData($data);
			
			new Message('info', 'Cadastro realizado com suscesso');

			Transaction::close();
		} 
		catch (Exception $e) 
		{
			new Message('error', $e->getMessage());	
		}
	}

	public function onEdit($params)
	{
		try
		{
			Transaction::open('livro');
			
			if(!empty($params['id']))
			{
				$funcionario = new Funcionario($params['id']);
				if($funcionario)
				{
					if($funcionario->idiomas)
					{
						$funcionario->idiomas = explode(',', $funcionario->idiomas);
					}
					
					$this->form->setData($funcionario);
				}
			}
			
			Transaction::close();
		}
		catch(Exception $e)
		{
			new Message('error', $e->getMessage());
		}
	}
}