<?php 
namespace Livro\Control;

abstract class BaseControl
{
	//controla chamada dos métodos de controle
	public function show()
	{
		if($_GET)
		{
			$method = isset($_GET['method'])?$_GET['method']:null;
			
			if(method_exists($this, $method))
			{
				call_user_func( [$this, $method], $_GET );
			}
		}
	}
}