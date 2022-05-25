<?php
namespace app\core;
use app\models\validators\FormValidator;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

class Model
{
    public $validator;

    function __construct()
    {
        $this->validator = new FormValidator();
    }

    function validateForm($data)
    {
        $this->validator->validate($data);
    }
}
