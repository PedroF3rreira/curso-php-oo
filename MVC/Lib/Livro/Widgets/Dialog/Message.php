<?php 
namespace Livro\Widgets\Dialog;

use Livro\Widgets\Base\Element;

class Message extends Element
{
	public function __construct($type, $message)
	{
		$div = new Element('div');

		switch($type)
		{
			case 'info':
				$div->class = 'alert alert-info';				
			break;
			
			case 'error':
				$div->class = 'alert alert-danger';
			break;

			case 'success':
				$div->class = 'alert alert-success';
			break;

			default:
			$div->class = 'alert alert-info';
			break;
		}

		$div->add($message);

		$div->show();

	}
}