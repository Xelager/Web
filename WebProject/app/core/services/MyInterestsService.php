<?php
namespace app\core\services;
use app\models\MyInterestsModel;

class MyInterestsService
{
    private MyInterestsModel $myInterests;

    public function __construct()
    {
        $this->myInterests = new MyInterestsModel();
    }

    public function printMyInterests() {
        echo '<h1 class="card-title d-flex text-about-header justify-content-center mt-2" id="mySerial">Мои интересы</h1>';
        echo '<div class="mb-3">';
        $myInterests = $this->myInterests->getData();
        foreach ($myInterests as $key => $myInterest) {
            $this->getContent($myInterest['content'], $key);
            $this->getImages($myInterest['photos']);
        }
    }

    private function getImages($photos) {
        $elemsOnLine = 3;
        $count = 0;
        echo '<div class="d-flex flex-column gap-3">';
        foreach ($photos as $key => $photo) {
            if ($count % $elemsOnLine === 0) {
                echo '<div class="d-flex justify-content-around">';
            }

            echo '<div class="row gap-3 image-interest align-self-end">';
            echo '<img src="'.$photo['path'].'" alt="The image was not found" />';
            echo '<span class="text-about-header"  id="'.$photo['id'].'">'.$photo['name'].'</span>';
            echo '</div>';
            if ($count % $elemsOnLine === ($elemsOnLine - 1)) {
                echo '</div>';
            }
            $count++;
        }
        echo '</div>';
    }

    private function getContent($content, $key) {
        echo '<h3 class="card-text d-flex text-about-header mt-5">'.$key.'</h3>';
        echo $content;
    }
}