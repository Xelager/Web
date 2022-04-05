<?php

namespace app\core;

class View
{
    public $route;
    public $path_content;
    public $path_layout = 'app/views/TemplateView.php';


    public function __construct($route) {
        $this->route = $route;
    }

    public function render($title, $vars = []) {
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
}