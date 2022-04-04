<?php
namespace app\controllers;
use app\core\Controller;

class TestController extends Controller
{
    function indexAction()
    {
        $this->view->render('Test');
    }
}
