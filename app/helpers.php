<?php 

use App\Core\Response;

if(!function_exists('asset')) {
	function asset() {}
}


if(!function_exists('dd')) {
	function dd($content) {
		echo '<pre>';
		var_dump($content);
		echo '</pre>';
		die();
	}
}


if(!function_exists('reponse')) {
	function reponse() {
		return new Response();
	}
}


