<?php 
require_once 'PHPMailer.php';
/**
 * classe adaptadora adapta o mailer para que possamos 
 * ter os mesmo métodos de bliblioteca antiga
 * 
 * a classe implementa os métodos sa interface para que fique bem definido
 * oque têm de ser adaptado
 */
class MailerAdapter implements SendMailAdapterInterface
{
	private $pm;

	public function __construct()
	{
		$this->pm = new PHPMailer(true);
		$this->pm->charset('utf8');
	}

	//implementa
	public function from($from, $name)
	{
		$this->pm->setFrom($from, $name);
	}

	//implementa
	public function body($content)
	{
		$this->pm->setBody($content);
	}

	//implementa
	public function send()
	{
		$this->pm->send();
	}
}