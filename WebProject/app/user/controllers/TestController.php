<?php
namespace app\user\controllers;
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
            if ($this->model->validator->isSuccessfulValidation)
            {
                $rating = $this->model->validator->checkAnswer($_POST);
                $this->model->addNewElement($rating);
            }
        }
        $this->view->render('test', $this->model);
    }
}
