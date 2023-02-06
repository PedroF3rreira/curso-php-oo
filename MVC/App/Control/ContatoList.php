<?php 

use Livro\Widgets\Wrapper\BootstarpDatagridWrapper;
use Livro\Widgets\Datagrid\Datagrid;
use Livro\Widgets\Datagrid\DatagridColumn;
use Livro\Control\BaseControl;
use Livro\Control\Action;
use Livro\Widgets\Dialog\Message;
use Livro\Database\Transaction;
use Livro\Database\Criteria;
use Livro\Database\Repository;

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
		$telefone = new DatagridColumn('telefone', 'Telefone:', 'left', '');

		$this->datagrid->addColumn($code);
		$this->datagrid->addColumn($name);
		$this->datagrid->addColumn($email);
		$this->datagrid->addColumn($telefone);
		$this->datagrid->addAction('Delete', new Action([$this, 'onDelete']), 'id');
		$this->datagrid->addAction('Edite', new Action([$this, 'onEdite']), 'id');

		parent::add($this->datagrid);
	}

	public function onReload()
	{
		$this->datagrid->clear();
        
        try
        {
        	Transaction::open('livro');
        	$criteria = new Criteria;
        	$repository = new Repository('Pessoa');
        	$pessoas = $repository->load($criteria);
        	
        	if($pessoas)
        	{
        		foreach($pessoas as $pessoa)
	        	{
        			$this->datagrid->addItem($pessoa);
    	    	}

        	}
        	else
        	{
        		new Message('info', 'não têm dados disponiveis');
        	}
        	
        	Transaction::close();
        }
        catch(Exception $e)
        {
        	new Message('error', $e->getMessage());
        }
	}

	public function onDelete($params)
	{
			try
			{
				Transaction::open('livro');
				$pessoa = Pessoa::find($params['id']);

				if($pessoa)
				{
						
					$pessoa->delete();
				}

				Transaction::close();
				$this->onReload();
				new Message('info', 'deletado com exito');
			}
			catch(Exception $e)
			{	
				new Message('error', $e->getMessage());
			}


	}

	public function onEdite()
	{
			// code...
	}	

	public function show()
	{
		$this->onReload();
		parent::show();
	}
}