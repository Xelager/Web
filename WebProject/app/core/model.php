<?php
namespace app\core;
use app\models\validators\FormValidator;

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
