<?php
namespace app\core\services;
use app\models\PhotosModel;

class PhotosService
{
    private PhotosModel $photos;
    private int $elemsOnLine = 5;

    public function __construct()
    {
        $this->photos = new PhotosModel();
    }

    public function printPhotos()
    {
        $count = 0;
        $photos = $this->photos->getPhoto();
        foreach ($photos as $key => $photo) {
            if (($count % $this->elemsOnLine) === 0) {
                echo '<div class="d-flex align-items-center">';
            }
            echo '<div class="d-flex flex-column gap-2 align-items-center cont">';
            echo '<div class="content">';
            echo '<img id="'.$key.'" class="content-image popup-open" src="'.$photo['path'].'" alt="The image '.$photo['alt'].' was not found" />';
            echo '</div>';
            echo '</div>';

            if (($count % $this->elemsOnLine) === ($this->elemsOnLine - 1)) {
                echo '</div>';
            }
            echo
                '<script>
                    var element = document.getElementById('.$key.');
                    var bigPhoto = document.getElementById("bigPhoto");
                    element.addEventListener(\'click\', (event) => {
                    var targetElement = document.getElementById(event.target.id);
                    bigPhoto.src = targetElement.src;
                    bigPhoto.title = targetElement.id;
                    bigPhoto.alt = targetElement.alt;
                   });
                </script>';

            $count = $count + 1;
    }
    }
}
