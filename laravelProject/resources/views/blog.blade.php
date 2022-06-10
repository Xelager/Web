@extends('template')

@section('title')
    Блог
@endsection

@section('main-content')
    <div class="d-flex flex-column mx-5 border-common justify-content-center">
        <div class="some-form">
            <div class="form text-about js-form-validate">
                <h1 class="card-title d-flex text-about-header justify-content-center mt-0 mb-3">Мой блог</h1>
                <div class="d-flex flex-column gap-3 text-guestBook pb-3">
                    <?php
                    foreach ($publications as $value) {
                        echo '<div class="card">';
                        echo '<div class="card-header d-flex justify-content-between" style="font-size: 18px;">';
                        echo '<div>Название: ' .$value->title.'</div>';
                        echo '<div>Дата написания: '. $value->createdAt.'</div>';
                        echo'</div>';
                        echo '<div class="card-body">';
                        if (trim($value->imageUrl))
                        {
                            echo '<img src="'. $value->imageUrl. '" class="image-blog my-3 mx-auto d-block" alt="Картинки не существует">';
                        }
                        echo '<p class="card-text" style="font-weight: 500; font-size: 16px;">'.$value->content.'</p>';
                        echo '</div>';
                        echo '</div>';
                    } ?>
                </div>

                <div class="d-flex justify-content-center my-3">

                        {{$publications->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
