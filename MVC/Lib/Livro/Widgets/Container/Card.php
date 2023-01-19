<?php 
namespace Livro\Widgets\Container;
use Livro\Widgets\Base\Element;

class Card extends Element
{
	public function __construct($cardTitle='')
	{
		parent::__construct('div');
	}

	public function add($content)
	{
		
	}
}