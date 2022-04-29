<?php

namespace app\models\validators;

class BlogValidator extends FormValidator
{
    public $errMessages = [
        "content" => "",
        "title" => "",
        "imageFile" => ""
    ];

    public $statements = [
        "content" => ["isNotEmpty"],
        "title" => ["isNotEmpty", "isWord"],
        "imageFile" => ["NotRequired", "isImageFile"]
    ];

    public $fileStatements = [
        "csvFile" => ["isCSVFile"]
    ];

    function validate($post_array, $predicates = []) : bool
    {
        return parent::validate($post_array, $this->statements);
    }

    function validateFile($post_array, $predicates = []) : bool
    {
        return parent::validate($post_array, $this->fileStatements);
    }
}
