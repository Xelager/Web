<?php
namespace app\admin\controllers;
use app\admin\models\HistoryModel;
use app\core\Controller;

class HistoryController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new HistoryModel();
    }

    function indexAction()
    {
        $this->view->render('history', $this->model);
    }
}