<?php 


require __DIR__ . '/../vendor/autoload.php';	



use App\Controllers\UserController;

$app = require_once '../bootstrap/app.php';

$app->router->get('/test', function () {
	return 'test route';
});


$app->router->get('/users', 'UserController@index');
$app->router->get('/users-1', [UserController::class, 'index']);

$app->router->get('/users-2', function () {
	return 'callback user index';
});


$app->run();
