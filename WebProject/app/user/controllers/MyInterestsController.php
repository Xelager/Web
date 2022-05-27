<?php
namespace app\user\controllers;
use app\core\Controller;
use app\models\MyInterestsModel;

class MyInterestsController extends Controller
{
    private MyInterestsModel $myInterestsModel;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->myInterestsModel = new MyInterestsModel();
    }

    function indexAction()
    {
        $this->view->render('myInterests', $this->myInterestsModel);
    }
}
