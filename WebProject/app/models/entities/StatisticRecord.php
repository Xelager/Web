<?php

namespace app\models\entities;
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
use app\core\BaseActiveRecord;

class StatisticRecord extends BaseActiveRecord
{
    public $id;
    public $userLogin;
    public $date;
    public $ip;
    public $page;
    public $host;
    public $browser;

    function __construct()
    {
        $this->tablename = 'StatisticRecord';
        parent::__construct();
    }

    public function saveStatisticRecord($page)
    {
        $this->userLogin = $_SESSION['user']['login'];
        $this->date = date('y.m.d h:i:s');
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->page = $page;
        $this->host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $this->browser = $_SERVER['HTTP_USER_AGENT'];
        return parent::save();
    }
}