<?php

namespace app\models\validators;

class AccountValidator extends FormValidator
{
    public $errMessages = [
        "login" => "",
        "password" => "",
        "email" => "",
        "name" => ""
    ];

    public $statements = [
        "login" => ["isNotEmpty", "isOneWord"],
        "password" => ["isNotEmpty", "isString", "isMoreCharacters"],
        "email" => ["isNotEmpty", "isEmail"],
        "name" => ["isNotRequired"]
    ];

    function validate($post_array, $predicates = []) : bool
    {
        return parent::validate($post_array, $this->statements);
    }
}
