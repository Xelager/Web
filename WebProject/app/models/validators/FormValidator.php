<?php
namespace app\models\validators;

class FormValidator
{
    public $rules = [];
    public $errors = [];
    public $errMessages = [];

    public $predicates = [];

    public $validateMessage = [
        'isNotEmpty' => 'Поле должно быть обязательно заполнено',
        'isInteger' => 'Введённые данные должны быть представлены в числовом формате',
        'isString' => 'Поле должно быть строкой',
        'isLess' => 'Поле должно быть меньше ',
        'isGreater' => 'Поле должно быть больше ',
        'isEmail' => 'Поле должно быть в формате email (ivan@test.com)',
        'isPhone' => 'Поле должно быть в формате номера телефона (+79198888888)',
        'isDate' => 'Поле должно быть в формате ДД.ММ.ГГ',
        'isMinAnswerSize' => 'Ответ слишком короткий',
        'isFIO' => 'ФИО должно быть в формате Иванов Иван Иванович'
    ];

    public function isNotEmpty($data): bool
    {
        return !empty($data);
    }

    public function isInteger($data): bool
    {
        return (is_numeric($data));
    }

    function isMinAnswerSize($data, $size): bool
    {
        return (sizeof(explode(" ", $data)) < $size);
    }

    function isFIO($data, $size): bool
    {
        return preg_match('/^[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{0,}\s[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{1,}(\s[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{1,})$/',
            $data);
    }

    function isLess($data, $value)
    {
        if ($this->isInteger($data) && $this->isInteger($value)) {
            return $data < $value;
        }
        return false;
    }

    function isGreater($data, $value)
    {
        if ($this->isInteger($data) && $this->isInteger($value)) {
            return $data > $value;
        }
        return false;
    }

    function isEmail($data)
    {
       return filter_var($data, FILTER_VALIDATE_EMAIL);
    }

    function isPhone($data)
    {
        return preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', $data);
    }

    function isWord($data)
    {
        if (!preg_match('/([A-Za-zА-Яа-я]){3,}/', $data)) {
            return "Введите корректное слово";
        }
    }

    function isDate($data)
    {
        return preg_match('/([0-9]|[0-9][0-9])\/([0-9]|[0-9][0-9])\/([0-9][0-9][0-9][0-9])/', $data);
    }

    function SetRule($field_name, $rules)
    {
        if ($rules) {
            $this->rules[$field_name] = $rules;
        }
    }

    protected function ruleSwitcher($field_name, $rule_name, $value)
    {
        $result = "";
        switch ($rule_name) {
            case "isNotEmpty":
            case "isEmail":
            case "isInteger":
            case "isPhone":
            case "isDate":
            case "isFIO":
            case "isWord": {
                    $result = $this->setValidateResult($rule_name, $value);
                    break;
                }
            case "isMinAnswerSize":
            {
                if ($this->isMinAnswerSize($value, 19)) {
                    $result = $this->validateMessage[$rule_name];
                };
                break;
            }
        }

        if (array_key_exists($field_name, $this->errors)) {
            $this->errors[$field_name][] = $result;
        } else {
            $this->errors[$field_name] = array($result);
        }
    }

    function setValidateResult($methodName, $value): ?string
    {
        if ($this->$methodName($value)) {
            return $this->validateMessage[$methodName];
        };
        return null;
    }

    function validate($post_array)
    {
        foreach ($post_array as $pkey => $value) {
            $rules = $this->predicates[$pkey];
            $this->SetRule($pkey, $rules);
        }

        foreach ($this->rules as $field => $rules) {
            foreach ($rules as $key => $rule_name) {
                $value = $post_array[$field];
                $this->ruleSwitcher($field, $rule_name, $value);
            }
        }
        $this->ShowErrors();
    }

    function ShowErrors()
    {
        foreach ($this->errors as $pkey => $errors) {
            $flag = false;
            foreach ($errors as $error) {
                if ($error != "") {
                    $flag = true;
                    break;
                }
            }
            if ($flag == true) {
                $this->errMessages[$pkey] = '<div style="color: red;">' . $error . '</div>';
            } else {
                $this->errMessages[$pkey] = '<div style="color: green;"> Верно!</div>';
            }
        }
    }
}
