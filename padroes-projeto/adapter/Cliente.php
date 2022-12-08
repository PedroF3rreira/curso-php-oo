<?php 

class Cliente
{

	public static function sendEmailIvoice($mailer)
	{
		$mailer->from('pedro@emailo.com');
		$mailer->body('uma fatura pra você');
		$mailer->send();
	}
}

Cliente::sendEmailIvoice(new OldMailer);
Cliente::sendEmailIvoice(new MailerAdapter);