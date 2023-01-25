<?php 

use Livro\Control\BaseControl;
use Livro\Widgets\Container\Card;
use Livro\Widgets\Container\CardDeck;

class ExemploCardDeckControl extends BaseControl
{
	public function __construct()
	{
		parent::__construct('div');

		$card1 = new Card('card1');
		$card1->style = 'margin: 10px';
		$card1->add('nxcdwoefcorihvoeinvbeonbvi');

		$card2 = new Card('card1');
		$card2->style = 'margin: 10px';

		$cardDeck = new CardDeck();
		$cardDeck->add($card1);
		$cardDeck->add($card2);
		parent::add($cardDeck);
	}
}