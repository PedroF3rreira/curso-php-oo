<?php 

class CSVParse
{
	private $filename;
	private $separator;
	private $count;
	public function __construct($filename, $separator=';')
	{
		$this->filename = $filename;
		$this->separator = $separator;
		$this->count = 1;
	}

	public function parse()
	{
		$this->data = file($this->filename);
		$this->header = $this->data[0];
	}

	public function fetch()
	{
		// code...
	}
}