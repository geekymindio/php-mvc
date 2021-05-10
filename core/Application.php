<?php 

namespace App\Core;

use App\Core\Request;
use App\Core\Router;
use App\Core\Response;

class Application {
	
	public static $ROOT_DIR;	
	public $router;
	public $request;
	public $response;

	public function __construct($rootDir) {
		$this->request = new Request();	
		$this->response = new Response();
		$this->router = new Router($this->request, $this->response);
		self::$ROOT_DIR = $rootDir;
	}


	public function run()
	{
		echo $this->router->dispatch();
	}
}