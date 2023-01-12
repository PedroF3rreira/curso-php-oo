<?php 

class LoggerTXT extends Logger
{

	public function write($message)
	{

		$text = date('Y-m-d h:m:s') . ' : ' . $message . PHP_EOL;

		$handle = fopen($this->filename, 'a');	
		fwrite($handle, $text);
		fclose($handle);
		
	}
}