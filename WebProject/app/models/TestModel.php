<?php
namespace app\models;
use app\core\Model;
use app\models\tables\Test;
use app\models\validators\TestValidator;

class TestModel extends Model {
    public $testTable;

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
        $this->testTable = new Test;
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

    public function saveData($rating)
    {
        $this->testTable->name = $_POST["FIO"];
        $this->testTable->answer1 = $_POST["question1"];
        $this->testTable->answer2 = $_POST["question2"];
        $this->testTable->answer3 = $_POST["question3"];
        $this->testTable->rating = $rating;
        $this->testTable->email = $_POST["email"];
        $this->testTable->date = date('d.m.y h:i:s');
        $this->testTable->save();
    }
}