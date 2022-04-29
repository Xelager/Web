<?php
namespace app\models\validators;

const MIN_WORD = 15;

class FormValidator
{
    public $rules = [];
    public $errors = [];
    public $errMessages = [];
    public $isSuccessfulValidation = true;
    public $statements = [];

    public $validateMessage = [
        'isNotEmpty' => 'Поле обязательно к заполнению',
        'isInteger' => 'Введённые данные должны быть представлены в числовом формате',
        'isLess' => 'Поле должно быть меньше ',
        'isGreater' => 'Поле должно быть больше ',
        'isEmail' => 'Поле должно быть в формате email (ivan@test.com)',
        'isPhone' => 'Поле должно быть в формате номера телефона (+79198888888)',
        'isDate' => 'Поле должно быть в формате ДД.ММ.ГГГГ',
        'isMinWord' => 'Некорректный ввод, не менее 15 слов',
        'isWord' => 'Строка должна быть длиннее',
        'isTextFile' => 'Данный файл должен быть .txt',
        'isImageFile' => 'Данный файл должен быть .png .jpg .jpeg',
        'isCSVFile' => 'Данный файл должен быть .csv'
    ];

    public function isTextFile($file) {
        return $file["type"] == "text/plane";
    }

    public function isImageFile($file) {
        return $file["type"] == "image/jpeg" || $file["type"] == "image/png";
    }

    public function isCSVFile($file) {
        return $file["type"] == "application/vnd.ms-excel" || $file["type"] == "text/csv";
    }

    public function isNotEmpty($data)
    {
        return trim($data);
    }

    public function isInteger($data)
    {
        return (is_numeric($data));
    }

    function isMinWord($data, $size)
    {
        return (sizeof(explode(" ", $data)) < $size);
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
        return preg_match('/^[\+][3, 7][0-9]{8,10}$/im', $data);
    }

    function isWord($data)
    {
        return preg_match('/([A-Za-zА-Яа-я]){3,}/', $data);
    }

    function isDate($data)
    {
        return preg_match('/([0-9]|[0-9][0-9]).([0-9]|[0-9][0-9]).([0-9][0-9][0-9][0-9])/', $data);
    }

    function SetRule($field_name, $rules)
    {
        if ($rules) {
            $this->rules[$field_name] = $rules;
        }
    }

    protected function ruleSwitcher($field_name, $rule_name, $value, $key)
    {
        $result = "";

        switch ($rule_name) {
            case "NotRequired":
                if ($value == null)
                {
                    break;
                }
                break;
            case "isNotEmpty":
            case "isEmail":
            case "isInteger":
            case "isPhone":
            case "isDate":
            case "isFIO":
            case "isWord":
            case "isImageFile":
            case "isTextFile":
            case "isCSVFile" :{
                    $result = $this->setValidateResult($rule_name, $value);
                    break;
                }
            case "isMinWord":
            {
                if ($this->isMinWord($value, MIN_WORD)) {
                    $result = $this->validateMessage[$rule_name];
                }
                break;
            }
        }

        if ($key === "answers" && $rule_name != $value) {
            $result = "Ответ не верный";
        }

        if (array_key_exists($field_name, $this->errors)) {
            $this->errors[$field_name][] = $result;
        } else {
            $this->errors[$field_name] = array($result);
        }
    }

    function setValidateResult($methodName, $value)
    {
        if ($this->$methodName($value) == false) {
            return $this->validateMessage[$methodName];
        };
        return "";
    }

    function validate($post_array, $statements): bool
    {
        $this->statements = $statements;
        foreach ($post_array as $pkey => $value) {
            $rules = $this->statements[$pkey];
            echo (in_array("NotRequired", $rules));
            if ($value == null && in_array("NotRequired", $rules)) {
                continue 1;
            }
            $this->SetRule($pkey, $rules);
        }

        foreach ($this->rules as $field => $rules) {
            foreach ($rules as $key => $rule_name) {
                $value = $post_array[$field];
                $this->ruleSwitcher($field, $rule_name, $value, $key);
            }
        }
        return $this->ShowErrors();
    }

    function ShowErrors(): bool
    {
        $printedError = "";
        $validateResultFlag = true;
        foreach ($this->errors as $key => $errors) {
            $flag = false;
            foreach ($errors as $error) {
                $printedError = $error;
                if ($error != "") {
                    $validateResultFlag = false;
                    $this->isSuccessfulValidation = false;
                    $flag = true;
                    break;
                }
            }

            if ($flag) {
                $this->errMessages[$key] = 'some-form__line-required';
                $this->errMessages[$key.'Error'] = $printedError;
            } else {
                $this->errMessages[$key] = 'some-form__line-succesfull';
                $this->errMessages[$key.'Error'] = "";
            }
        }
        return $validateResultFlag;
    }
}
