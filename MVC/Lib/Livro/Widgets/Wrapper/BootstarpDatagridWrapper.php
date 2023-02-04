<?php 
namespace Livro\Widgets\Wrapper;

use Livro\Widgets\Datagrid\Datagrid;
use Livro\Widgets\Base\Element;
use Livro\Widgets\Container\Card;

class BootstarpDatagridWrapper
{
	private $decorated;

	public function __construct(Datagrid $datagrid)
	{
		$this->decorated = $datagrid;
	}

	public function __call($method, $param)
	{
		return call_user_func_array([$this->decorated, $method], $param);
	}
	
	/**
	 * redireciona alterações nas propiedades do objeto
	 * **/
	public function __set($prop, $value)
	{
		$this->decorated->$prop = $value;
	}

	public function show()
	{
		$table = new Element('table');
		$table->class = "table table-striped table-hover";

	}
}