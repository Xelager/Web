<?php

namespace app\admin\controllers;

use app\core\Controller;
use app\admin\models\MyBlogModel;
use app\models\CommentModel;

class MyBlogController extends Controller
{
    public $commentModel;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new MyBlogModel();
        $this->commentModel = new CommentModel();
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

        $this->view->render('myBlog', $this->model, $this->commentModel);
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

    public function editPublicationAction()
    {
        $inputData = file_get_contents("php://input");
        $data = json_decode($inputData, true);
        $vars = [];
        if (!empty($data)) {
            $this->model->validateForm($data);
            if ($this->model->validator->isSuccessfulValidation && $this->model->table->existsPublicationById($data["id"]))
            {
                if ($this->model->table->updateBlog($data["id"], $data["title"], $data["content"],
                    $data["imageUrl"], $data["createdAt"]))
                {
                    $vars["data"] = $data;
                }
            }
        }

        $vars["model"] = $this->model;
        echo json_encode($vars);
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