<?php
namespace app\models;
use app\core\Model;
use app\models\entities\User;
use app\models\validators\AccountValidator;

class AccountModel extends Model
{
    public $table;

    public array $validated_fields = [
        "login" => "",
        "password" => "",
        "email" => "",
        "name" => ""
    ];

    function __construct()
    {
        $this->table = new User();
        $this->validator = new AccountValidator();
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
