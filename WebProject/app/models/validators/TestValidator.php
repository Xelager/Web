<?php
namespace app\models\validators;

class TestValidator extends FormValidator{
    public $errMessages = [
        "question1" => "",
        "question2" => "",
        "question3" => ""
    ];

    public $statements = [
        "question1" => ["isNotEmpty"],
        "question2" => ["isNotEmpty", "isMinWord"],
        "question3" => ["isNotEmpty"]
    ];

    function validate($post_array, $predicates = []) : bool
    {
        return parent::validate($post_array, $this->statements);
    }
}