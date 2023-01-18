<?php 
use Livro\Database\Transaction;
use Livro\Database\Repository;
use Livro\Database\Criteria;
/**
 * serviços são utilizados para disponibilizar recurssos para o mundo externo app fora de nossa aplicação
 */
class PessoaServices
{
	public static function getData($request)
	{
		try
		{
			Transaction::open('livro');
			
			$id_pessoa = $request['id'];
			$pessoa = Pessoa::find($id_pessoa);

			if($pessoa)
			{
				$pessoa_array = $pessoa->toArray();
			}
			else
			{
				throw new Exception("Pessoa {$id_pessoa} não encontrada");
			}
			Transaction::close();

			return $pessoa_array;
		}
		catch(Exception $e)
		{
			return $pessoa_array = $e->getMessage();
		}
	}
}