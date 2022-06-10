@extends('template')

@section('title')
    Главная
@endsection

@section('main-content')
    <link rel="stylesheet" href='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/css/demo.css'>
    <link rel="stylesheet" href="{{ asset('assets/css/background.css') }}">
    <div class="my-main">
        <div id="mainDiv">
            <div class="d-flex flex-grow-1 justify-content-center mb-2">
                <img id="mySuperPuperAvatar" class="img-center shadow" src="../assets/img/main.jpg" alt="Картинка отсутствует" />
            </div>
            <div  class="text-center" style="color: #F2F2F2 !important;">
          <span>Я, Газукин Александр Сергеевич,
            <br>
            студент третьего курса группы ИС/б-19-2-о
            <br>
            Лабораторная работа №1
            <br></span>
            </div>
        </div>
    </div>
    <canvas id="demo-canvas"></canvas>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/EasePack.min.js'></script>
    <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/rAF.js'></script>
    <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/TweenLite.min.js'></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
@endsection
