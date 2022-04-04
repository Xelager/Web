<?php

namespace app\core;
use app\core\View;

class Controller
{
    public $route;
    public View $view;

    function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
    }
}