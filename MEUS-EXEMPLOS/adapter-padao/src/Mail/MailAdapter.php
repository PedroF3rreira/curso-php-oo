<?php 

namespace DesignPatterns\Mail;

use DesignPatterns\Contracts\SendMailContract;
/**
 *este adaptdor não e por composição mas sim por agregação 
 */
class MailAdapter implements SendMailContract
{
	
	private $hMail;

	function __construct(HostingerMail $hMail)
	{
		$this->hMail = $hMail;
	}

	public function sendMail($from, $body)
	{
		$this->hMail->hSendMail($from, $body);
	}
}