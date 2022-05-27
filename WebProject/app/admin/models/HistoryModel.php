<?php

namespace app\admin\models;

use app\core\Model;
use app\models\entities\StatisticRecord;

class HistoryModel extends Model
{
    public $table;
    public $numberPage = 0;
    public $countPages = 0;

    function __construct()
    {
        $this->table = new StatisticRecord();
    }

    function getRecords($countOnPage)
    {
        $countRecords = $this->table->getCount();
        $this->countPages = (int)($countRecords / $countOnPage);
        $this->numberPage = isset($_GET["number"]) ? $this->setPagination($_GET["number"], $countOnPage) : 0;
        $firstElementPage = $countOnPage * $this->numberPage;
        return $this->table->getRecordsWithPagination($firstElementPage, $countOnPage, "ORDER BY date DESC");
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
