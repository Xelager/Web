<?php
namespace app\admin\controllers;
use app\core\Controller;

class HomeController extends Controller
{
    function indexAction()
    {
        $this->view->render('home');
    }
}
