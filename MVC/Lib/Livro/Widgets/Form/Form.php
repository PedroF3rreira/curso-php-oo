<?php 
namespace Livro\widgets\Form;

use Livro\Control\ActionInterface;

class Form
{
	protected $title;
	protected $name;
	protected $actions;
	protected $fields;

	public function __construct($name = 'My form')
	{
		$this->setName($name);
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($value)
	{
		$this->name = $value;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	public function addField($label, formElementInterface $object, $size = '100%')
	{
		$object->setSize($size);
		$object->setLabel($label);
		$this->fields[ $object->getName() ] = $object;
	}

	public function addAction($label, ActionInterface $action)
	{
		$this->actions[ $label ] = $action;
	}

	public function getFields()
	{
		return $this->fields;
	}

	public function getActions()
	{
		return $this->actions;
	}

	/**
	 * recebe um tipo de classe e retorna um objeto
	 * preenchido com os campos do formulário
	 * @param  string $type 
	 * @return object|mixed     
	 */
	public function getData($type = 'stdClass')
	{
		$object = new $type;
		
		foreach($this->fields as $name => $field)
		{
			$value = isset($_POST[$name]) ? $_POST[$name] : '';
			$object->$name = $value;
		}

		return $object;
	}

	/**
	 * recebe um objeto como parâmetro percorre
	 * e popula a propiedade fields 
	 * @param  $object
	 */
	public function setData($object)
	{
		foreach($this->fields as $name => $field)
		{
			if($name && isset($object->$name))
			{
				$field->setValue($object->$name);
			}
		}	
	}
}