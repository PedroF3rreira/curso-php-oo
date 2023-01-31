<?php 
namespace Livro\Widgets\Form;

interface FormElementInterface
{
	public function setName($value);
	
	public function getName();
	
	public function getValue();
	
	public function setValue($value);

	public function show();
	
}