<?php

namespace app\controllers;

use app\core\Controller;

class AccountController extends Controller
{
    private $adminsLog = [
        [
            'login' => 'admin',
            'password' => '21232f297a57a5a743894a0e4a801fc3',
            'name' => 'Газукин Александр Сергеевич'
        ],
    ];

    public function registerAction() {
        $vars2 = [];
        if (!empty($_POST)) {
            $this->model->validateForm($_POST);
            if ($this->model->validator->isSuccessfulValidation)
            {
                if ($this->model->table->existsLogin($_POST["login"]))
                {
                    $vars2["error"] = "Такой пользователь уже существует, укажите другой логин";
                } else {
                    $this->addNewUser();
                }
            }
        }

        $this->view->render('register', $this->model, $vars2);
    }

    public function loginAction() {
        $vars = [];
        if (!empty($_POST)) {
            if ($this->model->table->existsUser($_POST["login"], $_POST["password"])) {
                if ($this->isAdmin())
                {
                    $_SESSION['user']['isAdmin'] = 1;
                }
                $this->view->redirect("../home/index");
            } else {
                $vars["errors"] = ["User not found" => "Не удаётся найти пользователя"];
            }
        }

        $this->view->render('login', $vars);
    }

    private function addNewUser()
    {
        if ($this->model->table->saveUser($_POST["name"], $_POST["login"], $_POST["email"], $_POST["password"]))
            $this->view->redirect("../home/index");
        else
            echo "Failed to save user data in database";
    }

    private function isAdmin() {
        foreach ($this->adminsLog as $value) {
            if ($_SESSION['user']['login'] == $value["login"] && $_SESSION['user']['password'] == $value['password'])
                return true;
        }
        return false;
    }
}