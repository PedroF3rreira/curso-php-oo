<?php 

/**
 * interface criada para que o adaptador siga exatamente este contrato e implementes os
 * métodos que aclasse cliente prescisa para nao ter que mudar sua utilização
 * **/
interface SendMailAdapterInterface
{
	public function from($from, $name);
	public function body($content);
	public function send();
}