<?php 
namespace Livro\Widgets\Form;

abstract class Field implements FormElementInterface
{

	protected $name;
	protected $formLabel;
	protected $properties;
	protected $value;
	protected $editable;
	protected $size;

	public function __construct($name)
	{
		$this->setName($name);
		$this->setEditable(true);
		$this->properties = [];
	}
	
	public function getLabel()
	{
		return $this->formLabel;
	}
	
	public function setLabel($label)
	{
		$this->formLabel = $label;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function setValue($value)
	{
		$this->value = $value;
	}

	public function getProperty($property)
	{
		return $this->properties[$property];
	}

	public function setProperty($name, $value)
	{
		$this->properties[$name] = $value;
	}
	
	public function setSize($width, $height = null)
	{
		$this->size = $width;
	}
	
	//Utilizado para setar um atributo diretamente do objeto sem chamar o setProperty
	public function __set($name, $value)
	{
		if(is_scalar($value))
		{
			$this->properties[$name] = $value;
		}
	}

	//Utilizado para pegar um atributo diretamente do objeto sem chamar o getProperty
	public function __get($name)
	{
		if(isset($this->properties[$name]))
		{
			return $this->getProperty($name);
		}
	}

	public function setEditable($editable)
	{
		$this->editable = strtolower($editable);
	}

	public function getEditable()
	{
		return $this->editable;
	}

	public function show()
	{
		// code...
	}
}