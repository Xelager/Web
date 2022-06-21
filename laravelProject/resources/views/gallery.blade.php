@extends('template')

@section('title')
    Галерея
@endsection

@section('main-content')
    <link rel='stylesheet' href='{{ asset('assets/css/image.css') }}'>
    <div class="popup-fade">
        <div class="popup d-flex flex-column gap-2 align-items-center">
            <div class="d-flex justify-content-center">
                <img id="bigPhoto" src='#' class='popup-img' alt="#"/>
            </div>
            <div class="d-flex bg-dark px-3 icon-div">
                <i id="left-arrow" class="fas fa-arrow-left fa-5x icon-img margin-icon"></i>
                <i id="right-arrow" class="fas fa-arrow-right fa-5x icon-img"></i>
            </div>
        </div>
    </div>
    <div class="mx-3 my-5 py-5">

        <script>
            let bigPhoto = document.getElementById("bigPhoto");
            document.querySelector("#left-arrow").addEventListener('click', (event) => {
                if (Number(bigPhoto.title) - 1 >= 0)
                {
                    var popupElement = document.getElementById((Number(bigPhoto.title) - 1).toString());
                    bigPhoto.src = popupElement.src;
                    bigPhoto.title = popupElement.id;
                    bigPhoto.alt = popupElement.alt;
                }
            });
            document.querySelector("#right-arrow").addEventListener('click', (event) => {
                if (Number(bigPhoto.title) + 1 < Number(<?php echo count($gallery->getPhoto());?>))
                {
                    var popupElement = document.getElementById((Number(bigPhoto.title) + 1).toString());
                    bigPhoto.src = popupElement.src;
                    bigPhoto.title = popupElement.id;
                    bigPhoto.alt = popupElement.alt;
                }
            });
        </script>
        <?php
        $count = 0;
        $elemsOnLine = 5;
        $photos = $gallery->getPhoto();
        foreach ($photos as $key => $photo):
            if (($count % $elemsOnLine) === 0) {
                echo '<div class="d-flex align-items-center">';
            }
            echo '<div class="d-flex flex-column gap-2 align-items-center cont">';
            echo '<div class="content">';
            echo '<img id="'.$key.'" class="content-image popup-open" src="'.$photo['path'].'" alt="The image '.$photo['alt'].' was not found" />';
            echo '</div>';
            echo '</div>';

            if (($count % $elemsOnLine) === ($elemsOnLine - 1)) {
                echo '</div>';
            }
        ?>
            <script>
                var element = document.getElementById("<?php echo $key; ?>");
                element.addEventListener('click', (event) => {
                    console.log(event);
                var targetElement = document.getElementById(event.target.id);
                bigPhoto.src = targetElement.src;
                bigPhoto.title = targetElement.id;
                bigPhoto.alt = targetElement.alt;
                });
            </script>
        <?php
            $count = $count + 1;
            endforeach; ?>
    </div>
    </div>
@endsection
