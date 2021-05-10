<?php 

namespace App\Core;

use App\Core\Application;

class Router {
	
	protected $routes;
	protected $request;
	protected $response;

	public function __construct($request, $response) {
		$this->request = $request;
		$this->response = $response;
	}

	public function get($path, $callback) {
		$this->routes['get'][$path] = $callback;
	}


	public function post($path, $callback) {	
		$this->routes['post'][$path] = $callback;
	}


	public function put($path, $callback) {	
		$this->routes['put'][$path] = $callback;
	}


	public function patch($path, $callback) {		
		$this->routes['patch'][$path] = $callback;
	}


	public function delete($path, $callback) {	
		$this->routes['delete'][$path] = $callback;
	}


	public function dispatch() {

		$path = $this->request->getPath();
		$method = strtolower($this->request->getmethod());
		$callback = $this->routes[$method][$path] ?? false;

		if($callback === false) {
			return $this->response->notFound();
		}


		if(is_string($callback)) {
			$callback = explode('@', $callback);
			$callback[0] = "App\\Controllers\\" . $callback[0];
		}


		if(is_array($callback)) {
			$callback[0] = new $callback[0]();
		}


		return call_user_func($callback, $this->request);
	}
}