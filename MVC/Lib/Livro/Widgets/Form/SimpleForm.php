<?php 
namespace Livro\Widgets\Form;

class SimpleForm
{
	private array $fields;
	private string $title;
	private string $action;

	public function __construct()
	{
		$this->title = '';
	}

	public function setTitle($title)
	{
		// code...
	}

	public function addField($label, $name, $type, $value, $placeholder='', $class='', $id='')
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
		$this->action = $action;
	}

	public function show()
	{
		echo "
		<div class='panel panel-default'>
		  <div class='panel-heading'>Panel Heading</div>
		  <div class='panel-body'>";
		  foreach($this->fields as $value)
		  {

		  }
		echo"
		</div>
		</div>
		";
	}
}