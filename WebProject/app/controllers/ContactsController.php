<?php
namespace app\controllers;
use app\core\Controller;
use app\models\ContactsModel;

class ContactsController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new ContactsModel();
    }

    function indexAction()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->model->validateForm($_POST);
        }
        $this->view->render('Contacts', $this->model);
    }
}
