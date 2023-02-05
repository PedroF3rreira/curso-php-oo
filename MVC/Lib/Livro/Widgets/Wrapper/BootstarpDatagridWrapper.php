<?php 
namespace Livro\Widgets\Wrapper;

use Livro\Widgets\Datagrid\Datagrid;
use Livro\Widgets\Base\Element;
use Livro\Widgets\Container\Card;

class BootstarpDatagridWrapper
{
	private $decorated;

	public function __construct(Datagrid $datagrid)
	{
		$this->decorated = $datagrid;
	}

	public function __call($method, $param)
	{
		return call_user_func_array([$this->decorated, $method], $param);
	}
	
	/**
	 * redireciona alterações nas propiedades do objeto
	 * **/
	public function __set($prop, $value)
	{
		$this->decorated->$prop = $value;
	}

	public function show()
	{
		$table = new Element('table');
		$table->class = "table table-striped table-hover";

		$thead = new Element('thead');
		$table->add($thead);
		$this->createHeaders($thead);

		$tbody = new Element('tbody');
		$table->add($tbody);

		$items = $this->decorated->getItems();

		foreach ($items as $item) {
			$this->createItem($tbody, $item
			);
		}

		$card = new Card;
		$card->add($table);
		$card->show();
	}

	public function createHeaders($thead)
	{
		$row = new Element('tr');
		$thead->add($row);

		$actions = $this->decorated->getActions();
		$columns = $this->decorated->getColumns();

		if($actions)
		{
			foreach($actions as $action)
			{
				$cell = new Element('th');
				$cell->width = '40px';
				$row->add($cell);
			}
		}

		if($columns)
		{
			foreach($columns as $column)
			{
				$cell = new Element('th');
				$cell->add($column->getLabel());
				$cell->style = 'align-text: '.$column->getAlign();
				$cell->width = $column->getWidth();

				if($column->getAction())
				{
					$url = $column->getAction()->serialize();
					$cell->onclick = "document.location='$url'";
				}

				$row->add($cell);
			}
		}
	}

	public function createItem($tbody, $item)
	{
		$row = new Element('tr');
		$tbody->add($row);

		$actions = $this->decorated->getActions();
		$columns = $this->decorated->getColumns();

		if($actions)
		{
			foreach($actions as $action)
			{
				$button = new Element('a');

				$url = $action['action']->serialize();
				$label = $action['label'];
				
				$image = $action['image'];
				$field = $action['field'];
				
				$key = $item->$field;

				$button->href = "$url&key={$key}&{$field}={$key}";

				if($image)
				{
					$i = new Element('i');
					$i->class = $image;
					$i->title = $label;
					$i->add('');

					$button->add($i);
				}
				else
				{
					$button->add($label);
				}


				$td = new Element('td');
				$td->add($button);
				$td->align = 'center';

				$row->add($td);
			}
		}

		if($columns)
		{
			foreach($columns as $column)
			{
				$name = $column->getName();
				$label = $column->getLabel();
				$align = $column->getAlign();
				$width = $column->getWidth();
				$function = $column->getTransform();

				$data = $item->$name;

				if($function)
				{
					$data = class_user_function($function, $data);
				}

				$td = new Element('td');
				$td->add($data);
				$td->align = $align;
				$td->width = $width;

				$row->add($td);
			}
		}
	}
}