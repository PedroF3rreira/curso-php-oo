<?php 
namespace Livro\Widgets\Datagrid;

class DatagridColumn
{
	private $name;
	private $label;
	private $width;
	private $align;
	private $action;
	private $trasnform;

	public function __construct($name, $label, $align, $width)
	{
		$this->name = $name;
		$this->label = $label;
		$this->align = $align;
		$this->width = $width;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getLabel()
	{
		return $this->label;
	}

	public function getAlign()
	{
		return $this->align;
	}

	public function getWidth()
	{
		return $this->width;
	}

	public function setAction(ActionInterface $action)
	{
		$this->action = $action;
	}

	public function getAction()
	{
		return $this->action;
	}

	public function setTransform(callable $callback)
	{
		$this->transform = $callback;
	}

	public function getTransform()
	{
		return $this->trasnform;
	}

}