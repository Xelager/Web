<?php
namespace app\controllers;
use app\core\Controller;
use app\core\services\PhotosService;

class PhotosController extends Controller
{
    private PhotosService $photosService;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->photosService = new PhotosService();
    }

    function indexAction()
    {
        $this->view->render('Photos', $this->photosService);
    }
}
