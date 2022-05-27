<?php
namespace app\controllers;
use app\core\Controller;

class HistoryController extends Controller
{
    function indexAction()
    {
        $this->view->render('history');
    }
}