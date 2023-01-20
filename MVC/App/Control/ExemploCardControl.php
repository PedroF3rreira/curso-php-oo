<?php 

use Livro\Control\BaseControl;
use Livro\Widgets\Container\Card;
use Livro\Widgets\Base\Element;

class ExemploCardControl extends BaseControl
{
	public function __construct()
	{
		parent::__construct();

		$card = new Card('Meu Card');
		$card->style = 'margin: 20px;';
		$card->add( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
		$card->addFooter("Meu footer");

		parent::add($card);
	}
}