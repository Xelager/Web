<?php
namespace app\controllers;
use app\core\Controller;

class HomeController extends Controller
{
    function indexAction()
    {
        $this->view->render('home');
    }
}
