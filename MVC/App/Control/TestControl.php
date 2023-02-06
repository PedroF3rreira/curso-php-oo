<?php 
use Livro\Control\BaseControl;
use Livro\Widgets\Dialog\Message;
use Livro\Database\Transaction;
use Livro\Database\Criteria;
use Livro\Database\Repository;

class TestControl extends BaseControl
{

	public function onDelete($params)
	{
			try
			{
				Transaction::open('livro');
				$pessoa = Teste::find($params['id']);

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

	
}