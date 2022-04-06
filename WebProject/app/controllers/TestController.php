<?php
namespace app\controllers;
use app\core\Controller;
use app\models\TestModel;

class TestController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new TestModel();
    }

    function indexAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->model->validateForm($_POST);
        }
        $this->view->render('Contacts', $this->model);
    }
}
