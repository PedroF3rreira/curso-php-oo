<?php 
namespace App\Web;

use App\Models\Pessoa;

class PessoaController
{
	public function listPessoa()
	{
		var_dump((new Pessoa)->load());
	}
}


