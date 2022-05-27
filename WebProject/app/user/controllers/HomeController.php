<?php
namespace app\user\controllers;
use app\core\Controller;

class HomeController extends Controller
{
    function indexAction()
    {
        $this->view->render('home');
    }
}
