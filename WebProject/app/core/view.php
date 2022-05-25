<?php

namespace app\core;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class View
{
    public $route;
    public $path_content;
    public $path_layout = 'app/views/TemplateView.php';


    public function __construct($route) {
        $this->route = $route;
    }

    public function render($title, $vars = [], $vars2 = []) {
        $this->path_content = 'app/views/'.$this->route['controller'].'View'.'.php';
        $path_view = $this->path_content;
        if (strcasecmp($this->route['controller'], 'home') != 0) {
            $path_view = $this->path_layout;
        }

        if (file_exists($path_view) && file_exists($this->path_content)) {
            require $path_view;
        } else {
            Router::Error404();
        }
    }

    public static function redirect($url) {
        header('Location: ' . $url);
        exit;
    }
}