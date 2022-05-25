<?php

namespace app\admin\controllers;

use app\core\Controller;
use app\models\MyBlogModel;

class MyBlogController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new MyBlogModel();
    }

    function viewAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->model->validateForm($_POST);
            if ($this->model->validator->isSuccessfulValidation)
            {
                $this->model->AddNewRecord();
            }
        }

        $this->view->render('MyBlog', $this->model);
    }

    function loadFileAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->model->validateFile($_POST);
            if ($this->model->validator->isSuccessfulValidation)
            {
                $this->loadingCSV();
            }
        }

        header('Location: ' . '../myBlog/view', true, false);
        exit();
    }

    private function loadingCSV() {
        if ($vars = $this->model->getFromCSV($_FILES['csvFile']["tmp_name"])) {
            foreach ($vars as $value) {
                if ($this->model->AddViaPrepare($value['title'], $value['content'], $value['imageUrl'], $value['createdAt']) === false)
                    echo "Title invalid: " . $value['title'] . "<br>";
            }
            echo "File loaded<br>";
        } else
            echo "File was not loaded<br>";
    }
}