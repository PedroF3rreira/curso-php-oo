<?php 
namespace Livro\Widgets\Container;

use Livro\Widgets\Base\Element;

class Card extends Element
{
	private $body;
	private $footer;

	public function __construct($cardTitle='')
	{
		parent::__construct('div');
		$this->class = 'card';

		if($cardTitle)
		{
			$header = new Element('div');
			$header->class = 'card-header';

			$title = new Element('div');
			$title->class = 'card-title';

			$label = new Element('h4');
			$label->add($cardTitle);

			$header->add($title);
			$title->add($label);

			parent::add($header);
		}

		$this->body = new Element('div');
		$this->body->class = 'card-text';
		parent::add($this->body);

		$this->footer = new Element('div');
		$this->footer->class = 'card-footer';

	}

	public function add($content)
	{
		$this->body->add($content);
	}

	public function addFooter($footer)
	{
		$this->footer->add($footer);
		parent::add($this->footer);
	}
}