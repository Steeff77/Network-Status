<?php

declare(strict_types=1);

class Networkstatus {

	public $template;
	
	/**
	* Intialize the networkstatus class
	*
	* @param string $template
	* @return void
	*/
	function __construct($template){
		$this->template = $template;
	}
	
	/**
	* Check for server availability
	*
	* @param string $domain
	* @param int $port
	* @return int|null Ping to the server in ms
	*/
	function check(string $domain, int $port)
	{
		$startTime = microtime(true);
		$file = @fsockopen($domain, $port, $errno, $errstr, 1);
		$stopTime = microtime(true);
		$status = null;

		if (false === $file) {
			return null; // Website is offline
		}

		fclose($file);
		return (int)(($stopTime - $startTime) * 1000);
	}

	/**
	* Render a template
	*
	* @param array[] $data
	* @return void
	*/
	function render(array $data)
	{
		require $this->template;
	}
}
