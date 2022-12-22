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
		if(!file_exists($this->filename))
		{	
			throw new Exception("O arquivo " . $this->filename . " não existe");
		}
		if(!is_readable($this->filename))
		{
			throw new Exception("Você não têm permissão para ler o arquivo " . $this->filename );
		}
		
		$this->data = file($this->filename);
		$this->header =  str_getcsv($this->data[0], $this->separator);
		return true;
	}

	public function fetch()
	{
		if(isset($this->data[$this->count]))
		{
			$row = str_getcsv($this->data[$this->count ++ ], $this->separator);

			foreach ($row as $key => $value) 
			{
				$row[$this->header[$key]] = $value;	
			}

			return $row;
		}
	}
}