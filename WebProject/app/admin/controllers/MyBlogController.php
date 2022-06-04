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
        $users = [
            1 => [
                'avatar_url' => '/examples/ajax/img-01.jpg',
                'name' => 'Александр Мухин',
                'email' => 'alexander@mail.ru',
                'location' => 'Россия'
            ],
            2 => [
                'avatar_url' => '/examples/ajax/img-02.jpg',
                'name' => 'Евгений Смирнов',
                'email' => 'evgeniy@gmail.com',
                'location' => 'Украина'
            ],
            3 => [
                'avatar_url' => '/examples/ajax/img-03.jpg',
                'name' => 'Ольга Соколова',
                'email' => 'olga@yandex.ru',
                'location' => 'Россия'
            ]
        ];

        echo json_encode($users);
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