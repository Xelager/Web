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
        $this->tablename = 'myBlog';
        parent::__construct();
    }

    public function existsPublicationById($id) {
        $stmt = static::$pdo->query("SELECT * FROM " . $this->tablename . " WHERE id='$id'");
        return (bool)$stmt->fetch();
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

    public function updateBlog($id, $title, $content, $imageUrl, $createdAt) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->imageUrl = $imageUrl;
        $this->createdAt = $createdAt;

        return parent::save();
    }
}