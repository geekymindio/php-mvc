<?php 

namespace Core;

class Session {

	public function __construct() {
		session_start();
	}


	public function setFlash($key, $message) 
	{
		$_SESSION['flash_messages'][$key] = $message;
	}


	public function getFlash() 
	{
		$messages = $_SESSION['flash_messages'] ?? [];
		unset($_SESSION['flash_messages']);
		return $messages;
	}

	
	public function get($key) {
		return $_SESSION[$key] ?? '';
	}


	public function set($key, $value) {
		$_SESSION[$key] = $value;
	}


	public function has($key) {
		return isset($_SESSION[$key]);
	}
}
