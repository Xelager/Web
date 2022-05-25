<?php

namespace app\admin\controllers;

use app\core\Controller;
use app\models\GuestBookModel;

class GuestBookController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new GuestBookModel();
    }

    function indexAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($this->model->validateForm($_POST))
            {
                $this->model->saveFeedback();
            }
        }

        $this->view->render('GuestBook', $this->model);
    }

    public function uploadBookAction() {
        $data = "";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (strcmp($_FILES['feedbackFile']['type'], 'text/plane'))
            {
                $data = $this->model->uploadBook($_FILES['feedbackFile']) ? "Файл сохранён" :
                    "Ошибка при сохранении файла";
            }
        }

        setcookie('Data', $data, time() + 1);
        header('Location: ' . '../guestBook/index', true, false);
        exit();
    }
}