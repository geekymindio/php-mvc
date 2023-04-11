<?php

use Core\ExceptionHandler;

$app = new Core\Application(dirname(__DIR__));

$app->container->bind('test', function() {
    return 111;
});


set_exception_handler([ExceptionHandler::class, 'handle']);

return $app;
