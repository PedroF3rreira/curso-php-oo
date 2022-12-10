<?php 

namespace DesignPatterns\Contracts;

/**
 * interface do cliente que especifica a ssinatura d método
 * que deve ser implementado pela classe que quiser enviar o email
 */
interface SendMailContract
{
	
	public function sendMail($from, $body);
	
		
	
}