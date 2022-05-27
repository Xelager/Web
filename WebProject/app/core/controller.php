<?php

namespace app\core;

use app\models\entities\StatisticRecord;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class Controller
{
    public $route;
    public $statiscticRecordTable;
    public View $view;
    public Model $model;

    function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        if (class_exists($route['modelPath']))
            $this->model = new $route['modelPath'];

        if (isset($_SESSION['user']) && !isset($_SESSION['user']['isAdmin'])) {
            $this->statiscticRecordTable = new StatisticRecord();
            $this->statiscticRecordTable->saveStatisticRecord($route['controller'] . '/' . $route['action']);
        }
    }
}