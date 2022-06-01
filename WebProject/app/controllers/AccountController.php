<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;
use SimpleXMLElement;

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

    public function submitRegisterAction()
    {
        $xmlString = file_get_contents('php://input');
        $xml = simplexml_load_string($xmlString, null, LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);
        $vars2 = [];
        if (!empty($array)) {
            $this->model->validateForm($array);
            $isExistsLogin = false;

            if (!trim($this->model->validator->errMessages["loginError"]))
            {
                $isExistsLogin = $this->model->table->existsLogin($array["login"]);
                if ($isExistsLogin) {
                    $vars2["error"] = "Такой пользователь уже существует, укажите другой логин";
                }
            }

            if ($this->model->validator->isSuccessfulValidation && !$isExistsLogin) {
                $vars2["redirect"] = $this->addNewUser($array['name'], $array['login'], $array['email'], $array['password']);
            }
        }
        $vars2["model"] = $this->model;
        echo json_encode($vars2);
    }

    public function loginAction() {
        $vars2 = [];
        if (!empty($_POST)) {
            if ($this->model->table->existsUser($_POST["login"], $_POST["password"])) {
                if ($this->isAdmin())
                {
                    $_SESSION['user']['isAdmin'] = 1;
                }
                $this->view->redirect("../home/index");
            } else {
                $vars2["error"] = "Неправильный логин или пароль";
            }
        }

        $this->view->render('login', $this->model, $vars2);
    }

    private function addNewUser($name, $login, $email, $password)
    {
        if ($this->model->table->saveUser($name, $login, $email, $password)) {
            return "../account/login";
        }
        else {
            return "";
        }
    }

    private function isAdmin() {
        foreach ($this->adminsLog as $value) {
            if ($_SESSION['user']['login'] == $value["login"] && $_SESSION['user']['password'] == $value['password'])
                return true;
        }
        return false;
    }
}