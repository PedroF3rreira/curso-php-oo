<?php 
namespace Livro\Widgets\Form;

use Livro\Widgets\Base\Element;

class Entry extends Field implements FormElementInterface
{
	public function show()
	{
		$tag = new Element('input');
		$tag->class = 'form-control';
		$tag->name = $this->name;
		$tag->value = $this->value;
		$tag->type = 'text';
		$tag->style = "width: {$this->size}";

		if(parent::getEditable() === 'false')
		{
			$tag->readonly = '1';
		}

		if($this->properties)
		{
			foreach($this->properties as $property => $value)
			{
				$this->$property = $value;
			}
		}

		$tag->show();
	}
}