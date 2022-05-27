<?php

namespace app\controllers;

use app\core\Controller;
use app\models\MyBlogModel;

class MyBlogController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new MyBlogModel();
    }

    function viewAction()
    {
        $this->view->render('myBlog', $this->model);
    }
}