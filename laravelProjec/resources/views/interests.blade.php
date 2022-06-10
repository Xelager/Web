@extends('template')

@section('title')
    Мои интересы
@endsection

@section('main-content')
    <div class="btn-group d-flex flex-column mx-4 gap-2 text-about-header anchor p-2" style="background-color: white; border-radius: 8px;"  role="group" aria-label="Basic radio toggle button group">
        <a href="#top" class="btn btn-outline-primary" style="font-size: 18px !important; border-radius: 6px;">Вверх</a>
        <a href="#mySerial"  class="btn btn-outline-primary" style="font-size: 18px !important; border-radius: 6px;">1. Мои любимые сериалы</a>
        <a href="#myHobby" class="btn btn-outline-primary" style="font-size: 18px !important; border-radius: 6px;">2. Мои хобби</a>
        <a href="#myBooks" class="btn btn-outline-primary" style="font-size: 18px !important; border-radius: 6px;">3. Мои любимые книги</a>
        <a href="#myGames" class="btn btn-outline-primary" style="font-size: 18px !important; border-radius: 6px;">4. Мои любимые игры</a>
    </div>
    <div class="d-flex border-common justify-content-center">
        <div class="card text-about margin-text">
            <div class="card-body mx-3">
                <h1 class="card-title d-flex text-about-header justify-content-center mt-2" id="mySerial">Мои интересы</h1>
                <div class="mb-3">
                    <?php
                    $myInterests = $interests->getData();
                    foreach ($myInterests as $key => $myInterest) {
                        echo '<h3 class="card-text-indent d-flex text-about-header mt-5">'.$key.'</h3>';
                        echo $myInterest['content'];
                        $elemsOnLine = 3;
                        $count = 0;
                        echo '<div class="d-flex flex-column gap-3">';
                        foreach ($myInterest['photos'] as $key => $photo) {
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
                    ?>
                </div>
            </div>
        </div>
@endsection
