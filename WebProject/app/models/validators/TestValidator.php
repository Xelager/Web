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
        "FIO" => ["isNotEmpty", "isFIO"],
        "email" => ["isNotEmpty", "isEmail"],
        "question1" => ["isNotEmpty", "answers" => "1answerState"],
        "question2" => ["isNotEmpty", "isMinWord"],
        "question3" => ["isNotEmpty", "answers" => "answer1"]
    ];

    function validate($post_array, $predicates = [])
    {
        parent::validate($post_array, $this->statements);
    }
}