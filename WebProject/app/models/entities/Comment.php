<?php

namespace app\models\entities;

use app\core\BaseActiveRecord;

class Comment extends BaseActiveRecord
{
    public $id;
    public $createdAt;
    public $content;
    public $publicationId;
    public $userId;
    public $userName;

    function __construct()
    {
        $this->tablename = 'comment';
        parent::__construct();
    }

    public function saveComment($publicationId, $userId, $content, $userName, $createdAt) {
        $this->content = $content;
        $this->userId = $userId;
        $this->publicationId = $publicationId;
        $this->createdAt = $createdAt;
        $this->userName = $userName;

        return parent::save();
    }
}