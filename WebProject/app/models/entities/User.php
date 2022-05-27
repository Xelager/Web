<?php

namespace app\models\entities;

use app\core\BaseActiveRecord;
use PDO;

class User extends BaseActiveRecord
{
    public $id;
    public $name;
    public $login;
    public $email;
    public $password;
    public $validation;

    function __construct() {
        $this->tablename = 'UserData';
        parent::__construct();
    }

    public function saveUser($name, $login, $email, $password) {
        $this->name = $name;
        $this->login = $login;
        $this->email = $email;
        $this->password = md5($password);

        return parent::save();
    }

    public function existsLogin($login) {
        $stmt = static::$pdo->query("SELECT * FROM " . $this->tablename . " WHERE login='$login'");
        return (bool)$stmt->fetch();
    }

    public function existsUser($login, $password) {
        $password = md5($password);
        $stmt = static::$pdo->query("SELECT * FROM " . $this->tablename . " WHERE login='$login' AND password='$password'");
        if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'login' => $user['login'],
                'password' => $user['password'],
            ];
            return true;
        } else {
            return false;
        }
    }
}