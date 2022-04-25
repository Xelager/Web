<?php
namespace app\models;
use app\core\Model;
use app\models\validators\TestValidator;

class TestModel extends Model {

    public array $validated_fields = [
        "FIO" => "",
        "email" => "",
        "question1" => "",
        "question2" => "",
        "question3" => ""
    ];

    function __construct()
    {
        $this->validator = new TestValidator();
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
        return $this->validator->validate($this->validated_fields);
    }
}