<?php 

namespace DesignPatterns\Client;

class Client
{
	
	public function sendSubscript(SendMailContract $sendMail)
	{
		$sendMail->sedMail('teste@gmail.com', 'blablablablabblablablablablançl');
	}
}