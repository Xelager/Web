<?php

namespace app\user\controllers;

use app\core\Controller;
use app\models\CommentModel;
use app\models\MyBlogModel;

class MyBlogController extends Controller
{
    public $commentModel;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new MyBlogModel();
        $this->commentModel = new CommentModel();
    }

    public function viewAction()
    {
        $this->view->render('myBlog', $this->model, $this->commentModel);
    }

    public function saveCommentAction()
    {
        $vars2 = [];
        if (!empty($_POST)) {
            $this->commentModel->validateForm($_POST);
            if ($this->commentModel->validator->isSuccessfulValidation)
            {
                if ($this->model->table->existsPublicationById($_POST["publicationId"])) {
                    $createdAt = date('y.m.d h:i:s');
                    $vars2['successful'] = $this->addNewComment($createdAt);
                    if ($vars2['successful'])
                    {
                        $vars2['commentData'] = '<div class="card">
                        <div class="card-header d-flex justify-content-between ">
                            <div>Автор: '.$_SESSION['user']['name'].'</div>
<div>Дата написания: '.$createdAt.'</div>
</div>
<div class="card-body">
    <p class="card-text"> '.$_POST['content'].' </p>
</div>
</div>';
                    }
                } else {
                    $vars2['error'] = "Данные для отправки запроса неверные";
                }
            }
        }

        $vars2["commentModel"] = $this->commentModel;
        $vars2["blogModel"] = $this->model;
        echo json_encode($vars2);
    }

    private function addNewComment($createdAt): bool
    {
        if ($this->commentModel->commentTable->saveComment($_POST['publicationId'], $_SESSION['user']['id'], $_POST['content'], $_SESSION['user']['name'], $createdAt)) {
            return true;
        }
        return false;
    }
}