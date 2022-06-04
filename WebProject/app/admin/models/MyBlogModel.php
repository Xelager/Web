<?php

namespace app\admin\models;

use app\core\Model;
use app\models\entities\Blog;
use app\models\validators\BlogValidator;

class MyBlogModel extends Model
{
    public $table;
    public $numberPage = 0;
    public $countPages = 0;

    public array $validated_fields = [
        "content" => "",
        "title" => "",
        "imageFile" => ""
    ];

    public array $validate_file = [
        "csvFile" => ""
    ];

    function __construct()
    {
        $this->table = new Blog();
        $this->validator = new BlogValidator();
    }

    function validateForm($post_data)
    {
        unset($post_data["submit"]);

        foreach ($this->validated_fields as $key => $data)
        {
            if (!empty($post_data[$key])) {
                if ($key == "imageFile")
                {
                    $this->validated_fields[$key] = $_FILES['imageFile'];
                } else {
                    $this->validated_fields[$key] = $post_data[$key];
                }
            }
        }
        return $this->validator->validate($this->validated_fields);
    }

    function validateFile($post_data)
    {
        unset($post_data["submit"]);
        $this->validate_file["csvFile"] = $_FILES['csvFile'];
        return $this->validator->validateFile($this->validate_file);
    }

    function getRecords($countOnPage)
    {
        $countRecords = $this->table->getCount();
        $this->countPages = (int)($countRecords / $countOnPage);
        $this->numberPage = isset($_GET["number"]) ? $this->setPagination($_GET["number"], $countOnPage) : 0;
        $firstElementPage = $countOnPage * $this->numberPage;
        return $this->table->getRecordsWithPagination($firstElementPage, $countOnPage, "ORDER BY createdAt DESC");
    }

    function setPagination($pageNumber, $countOnPage)
    {
        $countRecords = $this->table->getCount();
        $this->countPages = (int)($countRecords / $countOnPage);
        if ($countRecords > 0 && ($countRecords % $countOnPage) == 0)
        {
            $this->countPages = $this->countPages - 1;
        }
        if ($pageNumber <= $this->countPages && $pageNumber > 0) {
            return $pageNumber;
        }
        elseif ($pageNumber > $this->countPages) {
            return $this->countPages;
        }
        else {
            return 0;
        }
    }

    public function AddNewRecord()
    {
        $record = new Blog();
        $record->title = $_POST['title'];
        $record->content = $_POST['content'];
        $fileUrl = trim($_FILES['imageFile']["name"]) ? $this->getBlogFileUrl($_FILES['imageFile']) : null;
        if ($fileUrl != null)
        {
            $record->imageUrl = ('/'.$fileUrl);
        }
        $record->createdAt = date('y.m.d h:i:s');
        return $record->save();
    }

    public function editRecord($id, $title, $content)
    {
        $record = new Blog();
        $record->title = $_POST['title'];
        $record->content = $_POST['content'];
        $fileUrl = trim($_FILES['imageFile']["name"]) ? $this->getBlogFileUrl($_FILES['imageFile']) : null;
        if ($fileUrl != null)
        {
            $record->imageUrl = ('/'.$fileUrl);
        }
        $record->createdAt = date('y.m.d h:i:s');
        return $record->save();
    }

    private function getBlogFileUrl($file)
    {
        $serverFilePath = "public/img/blog/" . uniqid() . $file["name"];
        move_uploaded_file($file["tmp_name"], $serverFilePath);
        return $serverFilePath;
    }

    public function getFromCSV($file) {
        $arrEl = array();
        $el = array();
        $fd = fopen($file, "r") or die("Файл нельзя открыть");
        
        while (($data = fgetcsv($fd, 1000, ";")) !== FALSE) {
            $el['id'] = $data[0];
            $el['title'] = $data[1];
            $el['content'] = $data[2];
            $el['imageUrl'] = $data[3];
            $el['createdAt'] = $data[4];
            $arrEl[] = $el;
        }
        fclose($fd);

        return $arrEl;
    }

    public function AddViaPrepare($title, $content, $imageUrl, $createdAt) {
        $record = new Blog();
        $record->title = $title;
        $record->content = $content;
        $record->imageUrl = $imageUrl;
        $record->createdAt = $createdAt;
        return $record->addViaPrepare();
    }
}
