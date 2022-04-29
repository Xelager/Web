<?php

namespace app\controllers;

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
            if ($_FILES['feedbackFile']['type'] == 'text/plane' && $_FILES['feedbackFile']['name'] == 'messages.inc.txt')
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