<?php 
namespace Livro\Form;

class FormElementInterface
{
	public function setName($value);
	
	public function getName();
	
	public function getValue();
	
	public function setValue($value);
	
}