<?php

namespace Core;

use Core\Request;
use Core\Router;
use Core\Response;

class ExceptionHandler
{
    public static function handle(\Exception $exception)
    {
        return $exception;
    }
}
