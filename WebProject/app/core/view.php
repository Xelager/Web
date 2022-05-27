<?php

namespace app\core;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class View
{
    private $additional_path;
    public $route;
    public $path_content;
    public $path_layout = 'app/views/TemplateView.php';


    public function __construct($route) {
        $this->route = $route;
    }

    public function render($path, $vars = [], $vars2 = [])
    {
        if ($this->route['additional_path'] == 'user\\') {
            $this->additional_path = "user/";
        } else if ($this->route['additional_path'] == 'admin\\') {
            $this->additional_path = "admin/";
        } else {
            $this->additional_path = "";
        }

        $this->path_content = 'app/' . $this->additional_path . 'views/' . $path . 'View.php';
        $this->path_layout = 'app/' . $this->additional_path . 'views/TemplateView.php';
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