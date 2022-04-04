<?php
namespace app\controllers;
use app\core\Controller;

class MyInterestsController extends Controller
{
    function indexAction()
    {
        $this->view->render('My interests');
    }
}
