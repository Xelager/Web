<?php

namespace app\models;

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
}
