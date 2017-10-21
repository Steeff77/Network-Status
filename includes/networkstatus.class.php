<?php

declare(strict_types=1);
session_start();

class Networkstatus {

	public $template;
	public $config;

	/**
	* Intialize the networkstatus class
	*
	* @param string $template
	* @return void
	*/
	function __construct($protected, $template = ""){
		$this->config = $protected;
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
	* Checks if the given password is the same as the password
	* provided in the config
	* 
	* @param string $password
	* @return boolean If the password is right
	*/
	function validatePassword(string $password){		
		switch ($this->config['type']) {
			case "bcrypt":
				return password_verify($password, $this->config['password']);
				break;
			case "plain":
				return $password == $this->config['password'];
				break;
		}
		
		return false;
	}

	/**
	* Render a template
	*
	* @param array[] $data
	* @return void
	*/
	function render(array $data)
	{
		if(!$this->config['enabled'] || isset($_SESSION['timestamp'])){
			require $this->template;
		}else{
			require $this->config['template'];
		}
	}
}
