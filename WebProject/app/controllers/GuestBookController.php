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
}