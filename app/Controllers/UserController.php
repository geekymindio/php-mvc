<?php 


namespace App\Controllers;

use Core\Request;

class UserController {
	
	public function index(Request $request) 
	{
		return $request->get('age', 'test');
	}

}
