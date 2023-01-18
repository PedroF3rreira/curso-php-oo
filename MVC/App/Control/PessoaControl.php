<?php 
use Livro\Database\Transaction;
use Livro\Database\Criteria;
use Livro\Database\Repository;
use Livro\Control\BaseControl;

class PessoaControl extends BaseControl
{
	public function list()
	{
		try
		{
			Transaction::open('livro');
			$criteria = new Criteria;
			$criteria->setProperty('order', 'id');

			$repository = new Repository('Pessoa');
			$pessoas = $repository->load($criteria);

			foreach( $pessoas as $pessoa )
			{
				echo "{$pessoa->id} - {$pessoa->nome} <br>";
			}

			Transaction::close();
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
}