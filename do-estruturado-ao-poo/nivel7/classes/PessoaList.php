<?php 

class PessoaList
{

	private $html;

	public function __construct()
	{
		$this->html = file_get_contents('html/list.html');

	}

	public function delete($param)
	{
		try {

			Pessoa::delete($param['id']);
			echo "Deletado";
			
		} catch (Exception $e) {
			echo"Erro: ".$e->getMessage();
		}
	}

	public function load()
	{
		try {
		
			$pessoas = Pessoa::all();

			$itens = '';

			foreach($pessoas as $pessoa)
			{
				$item = file_get_contents('html/item.html');
				$item = str_replace('{id}', $pessoa['id'], $item);
				$item = str_replace('{nome}', $pessoa['nome'], $item);
				$item = str_replace('{endereco}', $pessoa['endereco'], $item);
				$item = str_replace('{bairro}', $pessoa['bairro'], $item);
				$item = str_replace('{telefone}', $pessoa['telefone'], $item);
				$item = str_replace('{email}', $pessoa['email'], $item);
				$item = str_replace('{cidade}', $pessoa['cidade_nome'], $item);
				

				$itens .= $item; 
			}

			return $itens;
			
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage();
		}
	}

	public function show()
	{
		$this->html = str_replace('{itens}', $this->load(), $this->html);

		echo $this->html;
	}
}