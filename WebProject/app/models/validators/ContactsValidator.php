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

    public $predicates = [
        "FIO" => ["isNotEmpty", "isFIO"],
        "gender" => ["isNotEmpty"],
        "email" => ["isNotEmpty", "isEmail"],
        "phone" => ["isNotEmpty", "isPhone"],
        "dateValue" => ["isNotEmpty", "isDate"],
    ];

    function validate($post_array, $predicates = [])
    {
        parent::validate($post_array, $this->predicates);
    }
}
