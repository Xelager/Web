<?php
namespace app\controllers;
use app\core\Controller;
use app\models\PhotosModel;

class PhotosController extends Controller
{
    private PhotosModel $photosModel;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->photosModel = new PhotosModel();
    }

    function indexAction()
    {
        $this->view->render('photos', $this->photosModel);
    }
}
