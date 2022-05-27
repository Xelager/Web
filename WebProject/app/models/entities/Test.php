<?php

namespace app\models\entities;

use app\core\BaseActiveRecord;

class Test extends BaseActiveRecord
{
    public $id;
    public $name;
    public $answer1;
    public $answer2;
    public $answer3;
    public $rating;
    public $email;
    public $createdAt;

    function __construct()
    {
        $this->tablename = 'TestAlgorithm';
        parent::__construct();
    }
}
