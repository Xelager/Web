<?php

namespace app\core;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class Router {

    protected array $routes = [];

    public function __construct() {
        $this->routes['controller'] = $_REQUEST["controller"] ?? "Home";
        $this->routes['action'] = $_REQUEST['action'] ?? "index";

        if ($this->routes['controller'] == 'Account') {
            if (isset($_SESSION['user']))
                unset($_SESSION['user']);
        } else
            if (!$this->isAvailablePage($this->routes['controller']))
                View::redirect("../home/index");

        $this->setUserPath();
        $this->routes['controllerPath'] = "app\\{$this->routes['additional_path']}controllers\\{$this->routes['controller']}Controller";
        $this->routes['modelPath'] = "app\\{$this->routes['additional_path']}models\\{$this->routes['controller']}Model";

        $this->run();
    }

    public function run() {
        if (class_exists($this->routes['controllerPath'])) {
            $action = $this->routes['action'] . 'Action';
            if (method_exists($this->routes['controllerPath'], $action)) {
                $controller = new $this->routes['controllerPath']($this->routes);
                $controller->$action();
            } else {
                self::Error404();
            }
        } else {
            self::Error404();
        }
    }

    public static function Error404()
    {
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    }

    public function isAvailablePage($page) {

        if (isset($_SESSION['user']['isAdmin']))
            $pages = require 'app/admin/lib/route.php';
        elseif (isset($_SESSION['user']))
            $pages = require 'app/user/lib/route.php';
        else
            $pages = require 'app/lib/route.php';

        if (isset($pages[$page]))
            return true;
        return false;
    }

    public function setUserPath() {
        if (isset($_SESSION['user']['isAdmin']))
            $this->routes['additional_path'] = 'admin\\';
        elseif (isset($_SESSION['user']))
            $this->routes['additional_path'] = 'user\\';
        else
            $this->routes['additional_path'] = '';
    }
}
