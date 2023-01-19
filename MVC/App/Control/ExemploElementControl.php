<?php 

use Livro\Control\BaseControl;
use Livro\Widgets\Base\Element;

class ExemploElementControl extends BaseControl
{
	public function __construct()
	{
		parent::__construct();

		$div = new Element('div');
		// $div->style = " border: 2px solid #000;
		//  				text-align: center; 
		//  				width: 300px; 
		//  				margin: auto;
		//  				background-color: #999;";
		$div->class = "card";

		$p = new Element('p');
		$p->class = "card-header bg-info text-light";
		$p->add("Isso é um elemento paragrafo");

		$div->add($p);
		parent::add($div);
	}
}