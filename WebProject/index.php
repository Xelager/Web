<?php
use app\core\Router;
ini_set('display_errors', 1);
//Автозагрузчик, заменяет \ на /
spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});
session_start();

$router = new Router;
$router->run();