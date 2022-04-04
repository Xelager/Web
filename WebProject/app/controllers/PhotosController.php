<?php
namespace app\controllers;
use app\core\Controller;

class PhotosController extends Controller
{
    function indexAction()
    {
        $this->view->render('Photos');
    }
}
