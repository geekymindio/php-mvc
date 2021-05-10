<?php 


require __DIR__ . '/../vendor/autoload.php';	



use App\Controllers\UserController;

$app = new App\Core\Application(dirname(__DIR__));

$app->router->get('/test', function () {
	return 'test route';
});


$app->router->get('/users', 'UserController@index');
$app->router->get('/users1', [UserController::class, 'index']);

$app->router->get('/users2', function () {
	return 'callback user index';
});


$app->run();
