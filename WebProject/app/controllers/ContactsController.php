<?php
namespace app\controllers;
use app\core\Controller;

class ContactsController extends Controller
{
    function indexAction()
    {
        $this->view->render('Contacts');
    }
}
