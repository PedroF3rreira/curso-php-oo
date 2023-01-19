<?php 
use Livro\Control\BaseControl;
use Livro\Widgets\Form\SimpleForm;

class SimpleFormControl extends BaseControl
{
	public function __construct()
	{
		$sf = new SimpleForm('My-form');
		$sf->setTitle('Formulário simples');
		$sf->addField('Nome', 'nome', 'text', '', 'Digite seu nome');
		$sf->addField('Cidade', 'cidade', 'text', '', 'Digite sua cidade');
		$sf->addField('Estado', 'estado', 'text', '', 'Digite seu estado');
		$sf->addAction('index.php?class=SimpleFormControl&method=onGravar');
		$sf->addButton('Enviar');
		$sf->show();
	}

	public function onGravar($param)
	{
		var_dump($param);
	}
}