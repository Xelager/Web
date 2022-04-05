<?php
namespace app\controllers;
use app\core\Controller;
use app\core\services\MyInterestsService;

class MyInterestsController extends Controller
{
    private MyInterestsService $myInterestsService;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->myInterestsService = new MyInterestsService();
    }

    function indexAction()
    {
        $this->view->render('My interests', $this->myInterestsService);
    }
}
