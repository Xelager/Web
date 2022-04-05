<?php

namespace app\core;

use JsonSchema\Exception\ResourceNotFoundException;
use const Grpc\STATUS_NOT_FOUND;

class Router {

    protected array $routes = [];
    protected array $params = [];

    public function __construct() {
        $arr = require 'app/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    private function add($route, $params) {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    private function match(): bool
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run() {
        if ($this->match()) {
            $path = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    $this->Error404();
                }
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