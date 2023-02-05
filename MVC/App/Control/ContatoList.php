<?php 

use Livro\Widgets\Wrapper\BootstarpDatagridWrapper;
use Livro\Widgets\Datagrid\Datagrid;
use Livro\Widgets\Datagrid\DatagridColumn;
use Livro\Control\BaseControl;
use Livro\Control\Action;

class ContatoList extends BaseControl
{

	private $datagrid;

	public function __construct()
	{
		parent::__construct();

		$this->datagrid = new BootstarpDatagridWrapper( new Datagrid );

		$code = new DatagridColumn('id', 'Codigo:', 'left', '');
		$name = new DatagridColumn('nome', 'Nome:', 'left', '');
		$email = new DatagridColumn('email', 'Email:', 'left', '');
		$assunto = new DatagridColumn('assunto', 'Assunto:', 'left', '');

		$this->datagrid->addColumn($code);
		$this->datagrid->addColumn($name);
		$this->datagrid->addColumn($email);
		$this->datagrid->addColumn($assunto);
		$this->datagrid->addAction('Delete', new Action([$this, 'onDelete']), 'id');
		$this->datagrid->addAction('Edite', new Action([$this, 'onEdite']), 'id');

		parent::add($this->datagrid);
	}

	public function onReload()
	{
			 $this->datagrid->clear();
        
        $m1 = new stdClass;
        $m1->id   = 1;
        $m1->nome = 'Maria';
        $m1->email = 'maria@asdfasf';
        $m1->assunto = 'Dúvida 1';
        $this->datagrid->addItem($m1);
        
        $m2 = new stdClass;
        $m2->id   = 2;
        $m2->nome = 'Pedro';
        $m2->email = 'pedro@asdfasf';
        $m2->assunto = 'Dúvida 2';
        $this->datagrid->addItem($m2);
        
        $m3 = new stdClass;
        $m3->id   = 3;
        $m3->nome = 'José';
        $m3->email = 'jose@asdfasf';
        $m3->assunto = 'Dúvida 3';
        $this->datagrid->addItem($m3);
	}

	public function onDelete()
	{
			// code...
	}

	public function onEdite()
	{
			// code...
	}	
}