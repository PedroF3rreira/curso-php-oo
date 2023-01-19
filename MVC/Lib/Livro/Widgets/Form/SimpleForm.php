<?php 
namespace Livro\Widgets\Form;

class SimpleForm
{
	private array $fields;
	private string $title;
	private string $action;
	private string $name;

	public function __construct($name)
	{
		$this->title = '';
		$this->fields = [];
		$this->name = $name;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function addField($label, $name, $type, $value, $placeholder='', $class='', $id='')
	{
		$this->fields[] = [
			'label' => $label,
			'name' => $name,
			'type' => $type,
			'value' => $value,
			'placeholder' => $placeholder,
			'class' => $class,
			'id' => $id,
		];
	}

	public function addAction($action)
	{
		$this->action = $action;
	}

	public function addButton($title)
	{
		return "<button type='submit' class='btn btn-info'";
	}

	public function show()
	{
		echo "
		<div class='card' style='margin: 40px;'>
			<div class='card-header'>
			{$this->title}
			</div>
			<div class='card-body'>
			<form method='get' action='{$this->action}' class='form-horizontal'>";

			if($this->fields)
			{
				foreach($this->fields as $field)
				{
					echo "<div class='form-group'>";
					echo "<label class='col-sm-2 col-form-label'>{$field['label']}</label>";
					echo "<div class='col-sm-10'>";
					echo "<input name='{$field['name']}' type='{$field['type']}' class='form-control {$field['class']}' placeholder='{$field['placeholder']}'/>";
					echo "</div>";
					echo "</div>";
				}
			}

		echo "<div class='form-group'>";
		echo "<div class='col-sm-2'>";
		echo "<input type='submit' value='Enviar' class='btn btn-info'>";
		echo "</div>";
		echo "</div>";
		echo "</form>
			</div>
		</div>";
	}
}