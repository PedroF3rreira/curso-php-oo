<?php 
namespace Livro\Widgets\Wrapper;

use Livro\Widgets\Form\Form;
use Livro\Widgets\Container\Card;
use Livro\Widgets\Base\Element;
use Livro\Widgets\Form\Button;

class BootstrapFormWrapper
{

	private $decorated;

	public function __construct(Form $form)
	{
		$this->decorated = $form;
	}

	/**
	 * método será chamado sempre que usuario tentar executar um método que não existe
	 * assim chamando o método que vem do Form object
	 * @param $method
	 * @param $parameters
	 * @return mixed
	 */
	public function __call($method, $parameters)
	{
		return call_user_func_array([$this->decorated, $method], $parameters)
	}

	public function show()
	{
		$form = new Element('form');
		$form->enctype = 'multipart/form-data';
		$form->type = 'post';
		$form->name = $this->decorated->getName();
		$form->width = '100%';

		foreach($this->decorated->fields as $field)
		{
			$group = new Element('div');
			$group->class = 'form-group';
			
			$label = new Element('label');
			$label->add($field->getLabel());
			
			$col = new Element('div');
			$col->class = 'col-sm-2';
			$field->class = 'form-control';
			$col->add($field);

			$group->add($label);
			$group->add($col);
			$form->add($group);
		}

		$footer = new Element('div');

		foreach($this->decorated->getActions as $label => $action )
		{
			$button = new Button;
			$button->setAction($action, strtolower($label));
			$button->class = 'btn btn-dark';
			$button->setFormName($this->decorated->getName());
			$footer->add($button);
		}

		$card = new Card($this->decorated->getTitle());
		$card->add($form);
		$card->addFooter($footer);
		$form->show();
	}
}