<?php

namespace app\models\validators;

class CommentValidator extends FormValidator
{
    public $errMessages = [
        "content" => ""
    ];

    public $statements = [
        "content" => ["isNotEmpty"]
    ];

    function validate($post_array, $predicates = []) : bool
    {
        return parent::validate($post_array, $this->statements);
    }
}
