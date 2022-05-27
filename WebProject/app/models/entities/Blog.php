<?php

namespace app\models\entities;

use app\core\BaseActiveRecord;

class Blog extends BaseActiveRecord
{
    public $id;
    public $title;
    public $content;
    public $imageUrl;
    public $createdAt;

    function __construct()
    {
        $this->tablename = 'MyBlog';
        parent::__construct();
    }

    public function addViaPrepare() {
        [$values, $fields] = static::getData();
        $sql = static::$pdo->prepare("INSERT INTO " . static::$tablename . " (" . join(', ', array_slice($fields, 1)) . ") VALUES(:" . join(', :', array_slice($fields, 1)) . ")");
        $sql->bindParam(":title", $this->title);
        $sql->bindParam(":imageUrl", $this->imageUrl);
        $sql->bindParam(":content", $this->content);
        $sql->bindParam(":createdAt", $this->createdAt);
        return $sql->execute();
    }
}