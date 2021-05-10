<?php 


namespace App\Controllers;

use App\Core\Request;

class UserController {
	
	public function index(Request $request) 
	{
		return $request->get('age');
		return 'users index';
	}

}