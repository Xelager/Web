<?php
namespace app\models;
use app\core\Model;
use app\models\validators\ContactsValidator;

class ContactsModel extends Model
{
    public array $validated_fields = [
        "FIO" => "",
        "gender" => "",
        "email" => "",
        "phone" => "",
        "birthDate" => ""
    ];

    function __construct()
    {
        $this->validator = new ContactsValidator();
    }

    function validateForm($post_data)
    {
        unset($post_data["submit"]);

        foreach ($this->validated_fields as $key => $data)
        {
            if (!empty($post_data[$key])) {
                $this->validated_fields[$key] = $post_data[$key];
            }
        }
        $this->validator->validate($this->validated_fields);
    }
}
