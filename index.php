<?php

require_once 'application/lib/debug.php';
require_once 'application/config/constans.php';

use application\core\Router;

spl_autoload_register(function ($class_name){
    $path = str_replace('\\', '/', $class_name).'.php';
    if (file_exists($path)){
        require $path;
    }
});

$router = new Router();
$router->run();

