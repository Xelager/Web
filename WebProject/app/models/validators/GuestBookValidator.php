<?php
namespace app\models\validators;

class GuestBookValidator extends FormValidator
{
    public $errMessages = [
        "firstName" => "",
        "lastName" => "",
        "patronymic" => "",
        "email" => "",
        "feedback" => "",
    ];

    public $statements = [
        "firstName" => ["isNotEmpty"],
        "lastName" => ["isNotEmpty"],
        "patronymic" => ["isNotEmpty"],
        "email" => ["isNotEmpty", "isEmail"],
        "feedback" => ["isNotEmpty", "isWord"]
    ];

    function validate($post_array, $predicates = []) : bool
    {
        return parent::validate($post_array, $this->statements);
    }
}
