<?php 
namespace Livro\Control;

use Livro\Widgets\Base\Element;

abstract class BaseControl extends Element
{
	public function __construct()
	{
		parent::__construct('div');
	}
	//controla chamada dos métodos de controle
	public function show()
	{
		if($_GET)
		{
			$method = isset($_GET['method']) ? $_GET['method'] : '';
			
			if(method_exists($this, $method))
			{
				call_user_func( [$this, $method], $_REQUEST );
			}
		}

		parent::show();
	}
}