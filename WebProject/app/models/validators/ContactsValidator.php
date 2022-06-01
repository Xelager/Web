<?php
namespace app\models\validators;

class ContactsValidator extends FormValidator
{
    public $errMessages = [
        "FIO" => "",
        "gender" => "",
        "email" => "",
        "phone" => "",
        "birthDate" => ""
    ];

    public $statements = [
        "FIO" => ["isNotEmpty"],
        "gender" => ["isNotEmpty"],
        "email" => ["isNotEmpty", "isEmail"],
        "phone" => ["isNotEmpty", "isPhone"],
        "birthDate" => ["isNotEmpty", "isDate"],
    ];

    function validate($post_array, $predicates = []) : bool
    {
        return parent::validate($post_array, $this->statements);
    }
}
