<?php 
require_once 'PHPMailer.php';
/**
 * classe adaptadora adapta o mailer para que possamos 
 * ter os mesmo métodos de bliblioteca antiga
 */
class MailerAdapter
{
	private $pm;

	public function __construct()
	{
		$this->pm = new PHPMailer(true);
		$this->pm->charset('utf8');
	}

	public function from($from, $name)
	{
		$this->pm->setFrom($from, $name);
	}

	public function body($content)
	{
		$this->pm->setBody($content);
	}

	public function send()
	{
		$this->pm->send();
	}
}