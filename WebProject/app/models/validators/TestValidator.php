<?php
namespace app\models\validators;

class TestValidator extends FormValidator{
    public $errMessages = [
        "FIO" => "",
        "email" => "",
        "question1" => "",
        "question2" => "",
        "question3" => ""
    ];

    public $statements = [
        "FIO" => ["isNotEmpty", "isWord"],
        "email" => ["isNotEmpty", "isEmail"],
        "question1" => ["isNotEmpty"],
        "question2" => ["isNotEmpty", "isMinWord"],
        "question3" => ["isNotEmpty"]
    ];

    function validate($post_array, $predicates = []) : bool
    {
        return parent::validate($post_array, $this->statements);
    }
}