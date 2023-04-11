<?php 

namespace Core;

class Response {
	
	protected int $statusCode = 200;
	protected Container $content;

	public function setStatusCode($statusCode) {
		$this->statusCode = $statusCode;
		return $this;
	}


	public function view($view) {
		$layoutContent = $this->getLayoutContent();
		$viewContent  = $this->getViewContent($view);

		http_response_code($this->statusCode);

		return str_replace('{{content}}', $viewContent, $layoutContent);
	}


	public function notFound(){
		return $this->setStatusCode(404)->view('_404');
	}


	public function redirect($path) {
		header('Location:' . $path);
		exit();
	}


	protected function getViewContent($view) {
		ob_start();
		include_once Application::$ROOT_DIR . '/resources/views/' . $view . '.php';
		return ob_get_clean();
	}



	protected function getLayoutContent() {
		ob_start();
		include_once Application::$ROOT_DIR . '/resources/views/layouts/main.php';
		return ob_get_clean();
	}


}
