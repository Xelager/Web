<?php
namespace app\user\controllers;
use app\core\Controller;

class EducationController extends Controller
{
    function indexAction()
    {
        $this->view->render('education');
    }
}
