<?php 

namespace Core;

use Core\Request;
use Core\Router;
use Core\Response;

class Application {
	
	public static string $ROOT_DIR;
	public Router $router;
	public Request $request;
	public Response $response;
	public Container $container;

	public function __construct($rootDir) {
		$this->request = new Request();	
		$this->response = new Response();
		$this->router = new Router($this->request, $this->response);
		$this->container = new Container();
		self::$ROOT_DIR = $rootDir;
	}


	public function run()
	{
		echo $this->router->dispatch();
	}
}
