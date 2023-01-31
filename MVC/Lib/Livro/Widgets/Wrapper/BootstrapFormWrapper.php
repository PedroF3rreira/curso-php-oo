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
		return call_user_func_array([$this->decorated, $method], $parameters);
	}

	public function show()
	{
		$element = new Element('form');
        $element->class   = 'form-horizontal';
        $element->enctype = 'multipart/form-data';
        $element->method  = 'post';
        $element->name    = $this->decorated->getName();
        $element->width   = '100%';
        
        foreach ($this->decorated->getFields() as $field)
        {
            $group = new Element('div');
            $group->class = 'form-group';
            
            $label = new Element('label');
            $label->class = 'col-sm-2 control-label';
            $label->add( $field->getLabel() );
            
            $col = new Element('div');
            $col->class = 'col-sm-10';
            $col->add( $field );
            $field->class = 'form-control';
            
            $group->add($label);
            $group->add($col);
            $element->add($group);
        }
        
        $footer = new Element('div');
        $i = 0;
        foreach ($this->decorated->getActions() as $label => $action)
        {
            $name   = strtolower(str_replace(' ', '_', $label));
            $button = new Button($name);
            $button->setFormName($this->decorated->getName());
            $button->setAction($action, $label);
            $button->class = 'btn ' . ( ($i==0) ? 'btn-success' : 'btn-default');
            
            $footer->add($button);
            $i ++;
        }
        
        $panel = new Card( $this->decorated->getTitle() );
        $panel->add( $element );
        $panel->addFooter( $footer );
        $panel->show();
	}
}