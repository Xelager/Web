<?php
namespace app\controllers;
use app\core\Controller;

class AboutMeController extends Controller
{
    function indexAction()
    {
        $this->view->render('aboutMe');
    }
}
