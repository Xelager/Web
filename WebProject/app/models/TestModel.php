<?php
namespace app\models;
use app\core\Model;
use app\models\entities\Test;
use app\models\validators\ResultsValidation;
use app\models\validators\TestValidator;

class TestModel extends Model {
    public $testTable;
    public $numberPage = 0;
    public $countPages = 0;

    public array $validated_fields = [
        "FIO" => "",
        "email" => "",
        "question1" => "",
        "question2" => "",
        "question3" => ""
    ];

    function __construct()
    {
        parent::__construct();
        $this->validator = new ResultsValidation();
        $this->testTable = new Test();

        $this->validator->SetAnswer('question1', "1answerState");
        $this->validator->SetAnswer('question2', 'derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh derabdsrteh ');
        $this->validator->SetAnswer('question3', 'answer1');
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

    public function addNewElement($rating)
    {;
        $record = new Test();
        $record->name = $_POST["FIO"];
        $record->answer1 = $_POST["question1"];
        $record->answer2 = $_POST["question2"];
        $record->answer3 = $_POST["question3"];
        $record->rating = $rating;
        $record->email = $_POST["email"];
        $record->createdAt = date('y.m.d h:i:s');
        $record->save();
    }

    function getRecords($countOnPage)
    {
        $countRecords = $this->testTable->getCount();
        $this->countPages = (int)($countRecords / $countOnPage);
        $this->numberPage = isset($_GET["number"]) ? $this->setPagination($_GET["number"], $countOnPage) : 0;
        $firstElementPage = $countOnPage * $this->numberPage;
        return $this->testTable->getRecordsWithPagination($firstElementPage, $countOnPage, "ORDER BY createdAt DESC");
    }

    function setPagination($pageNumber, $countOnPage)
    {
        $countRecords = $this->testTable->getCount();
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