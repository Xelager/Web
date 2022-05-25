<?php

namespace app\controllers;

use app\core\Controller;

class AccountController extends Controller
{
    private $adminsLog = [
        [
            'login' => 'admin',
            'password' => 'LJBsmGDZkjeN3Tr68xV7qCHPdauSXURc',
            'name' => 'Газукин Александр Сергеевич'
        ],
    ];

    public function registerAction() {

        if (!empty($_POST)) {
            $this->model->validate_registration_Action();
            if (empty($this->model->validation->Errors))
                $this->addNewUser();
        }

        $this->view->render('Регистрация', $this->model);
    }

    public function loginAction() {
        $vars = [];
        if (!empty($_POST)) {
            if ($this->model->existsUser($_POST["login"], $_POST["password"])) {
                if ($this->isAdmin())
                    $_SESSION['user']['isAdmin'] = 1;
                $this->view->redirect("../Home/index");
            } else {
                $vars["errors"] = ["User not found" => "Не удаётся найти пользователя"];
            }
        }

        $this->view->render('Логин', $vars);
    }

    public function addNewUser() {
        if ($this->model->existsLogin($_POST["login"]))
            echo "<div class='error'>Текущий логин уже занят, Выберите другой</div><br>";
        else
            if ($this->model->saveUser($_POST["name"], $_POST["login"], $_POST["email"], $_POST["password"]))
                $this->view->redirect("../home/index");
            else
                echo "Что-то пошло не так, вас не смогли сохранить в базу данных";
    }

    public function isAdmin() {
        foreach ($this->adminsLog as $value) {
            if ($_SESSION['user']['login'] == $value["login"] && $_SESSION['user']['password'] == $value['password'])
                return true;
        }
        return false;
    }
}