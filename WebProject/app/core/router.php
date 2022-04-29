<?php

namespace app\core;

class Router {

    protected array $routes = [];

    public function __construct() {
        $this->routes['controller'] = $_REQUEST["controller"] ?? "Home";
        $this->routes['action'] = $_REQUEST['action'] ?? "index";
    }

    public function run() {
            $path = 'app\controllers\\'.ucfirst($this->routes['controller']).'Controller';
            if (class_exists($path)) {
                $action = $this->routes['action'].'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->routes);
                    $controller->$action();
                } else {
                    $this->Error404();
                }
            } else {
                $this->Error404();
            }
    }

    public static function Error404()
    {
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    }
}
