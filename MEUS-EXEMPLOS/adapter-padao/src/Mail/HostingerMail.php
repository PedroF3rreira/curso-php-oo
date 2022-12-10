<?php 

namespace DesignPatterns\Mail;

/**
 * 
 */
class HostingerMail 
{
	
	private $api;

	public function __construct($api)
	{
		$this->api = $api;
	}

	public function hSendmail($from, $body)
	{
		return echo "envia email";
	}
}