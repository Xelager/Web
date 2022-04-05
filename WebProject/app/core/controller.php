<?php

namespace app\core;

class Controller
{
    public $route;
    public View $view;
    public Model $model;

    function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = new Model();
    }
}