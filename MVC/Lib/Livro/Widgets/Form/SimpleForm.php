<?php 
namespace Livro\Widgets\Form;

class SimpleForm
{
	private array $fields;
	private string $title;

	public function __construct()
	{
		$this->title = '';
	}

	public function setTitle($title)
	{
		// code...
	}

	public function addField($label, $name, $type, $placeholder='', $class='', $id='')
	{
		$this->fields[] = [
			'label' => $label,
			'name' => $name,
			'type' => $type,
			'placeholder' => $placeholder,
			'class' => $class,
			'id' => $id
		];
	}

	public function addAction($action)
	{
		
	}
}