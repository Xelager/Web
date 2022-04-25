<?php
namespace app\models;
use app\core\Model;
use app\models\validators\GuestBookValidator;

class GuestBookModel extends Model
{
    public $path = "public/files/messages.inc.txt";
    public $file;

    public array $validated_fields = [
        "firstName" => "",
        "lastName" => "",
        "patronymic" => "",
        "email" => "",
        "feedback" => "",
    ];

    function __construct($file = null, $path = null)
    {
        $this->validator = new GuestBookValidator();
        $this->file = fopen($this->path, "a+");
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

    public function uploadBook($file)
    {
        $name = "public/files/" . $file["name"];
        return move_uploaded_file($file["tmp_name"], $name);
    }

    public function getFeedbacksFromFile() {
        $arr = [];
        $fileContent = file($this->path);
        foreach ($fileContent as $key => $value) {
            $arr["date"] = date(substr($value, 0, strpos($value, ';')));
            $value = strstr($value, ";");
            $arr["lastName"] = substr($value, 1, @strpos($value, ';', 1) - 1);
            $value = substr($value, 1);
            $value = strstr($value, ";");
            $arr["firstName"] = substr($value, 1, @strpos($value, ';', 1) - 1);
            $value = substr($value, 1);
            $value = strstr($value, ";");
            $arr["patronymic"] = substr($value, 1, @strpos($value, ';', 1) - 1);
            $value = substr($value, 1);
            $value = strstr($value, ";");
            $arr["email"] = substr($value, 1, @strpos($value, ';', 1) - 1);
            $value = substr($value, 1);
            $value = strstr($value, ";");
            $arr["feedback"] = substr($value, 1);

            if (trim($arr["date"]) && trim($arr["firstName"]) && trim($arr["lastName"]) && trim($arr["patronymic"]) &&
                trim($arr["email"]) && trim($arr["feedback"]))
            {
                $records[$key] = $arr;
            }
        }
        usort($records, array('app\models\GuestBookModel', 'compare'));
        return $records ?? [];
    }

    public function saveFeedback() {
        $message = PHP_EOL . date('d.m.y h:m') . ';' . $_POST["lastName"] . ';' . $_POST["firstName"] . ';' .
            $_POST["patronymic"] . ';' . $_POST["email"] . ';' . $_POST["feedback"];
        if (!fwrite($this->file, $message)) {
            echo "Ошибка записи в файл: " . $this->path;
        }
    }

    private function compare($first, $second)
    {
        if ($first["date"] == $second["date"]) {
            return 0;
        }
        return (strtotime($first["date"]) < strtotime($second["date"])) ? -1 : 1;
    }
}
