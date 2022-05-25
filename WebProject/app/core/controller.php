<?php

namespace app\core;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class Controller
{
    public $route;
    public $tableStatistic;
    public View $view;
    public Model $model;

    function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        if (class_exists($route['modelPath']))
            $this->model = new $route['modelPath'];

        if (isset($_SESSION['user']) && !isset($_SESSION['user']['isAdmin'])) {
            $this->tableStatistic = new Statistics;
            $this->tableStatistic->saveStatistic($route['controller'] . '/' . $route['action']);
        }
    }
}