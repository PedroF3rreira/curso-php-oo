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

		$code = new DatagridColumn('id', 'Codigo:', 'center', '10%');
		$name = new DatagridColumn('name', 'Nome:', 'center', '20%');
		$email = new DatagridColumn('email', 'Email:', 'center', '20%');
		$assunto = new DatagridColumn('content', 'Assunto:', 'center', '30%');

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