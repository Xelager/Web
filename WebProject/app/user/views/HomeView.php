<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$pages = require 'app/lib/route.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css" rel="stylesheet" type="text/css" />
    <link rel='stylesheet' href='../../public/css/style.css'>
    <link rel='stylesheet' href='../../public/css/dropDownMenuInterests.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Gemunu+Libre:wght@700&family=Inter:wght@700&family=Open+Sans:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/css/demo.css'>
    <script src="../../public/js/Scripts/myInterestsDropMenu.js"></script>
    <script src="../../public/js/Scripts/clock.js"></script>
    <link rel="stylesheet" href="../../public/css/background.css">
    <title><?php if (isset($pages[$this->route['controller']][$this->route['action']])) {
            echo $pages[$this->route['controller']][$this->route['action']];
        } ?></title>
</head>

<body>
<div id="large-header" class="large-header">
    <header class="border-nav fixed-top navbar-expand-sm">
        <nav class="navbar navbar-light bg-white">
            <div id="clock" class="navbar-brand-font px-0 py-2"></div>
            <div class="main-container align-content-center justify-content-center">
                <div class="d-flex align-items-center py-2">
                    <div>
                        <a class="navbar-brand" href="/">
                            <img src="../../public/img/Avatar.jpg" class="nav-image" alt="Картинка отсутствует" >
                            <span class="navbar-brand-font btn-lazur">Gazukin</span>
                        </a>
                    </div>
                    <div>
                        <ul class="nav gap-3 nav-font">
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../aboutMe/index"><i class="fas fa-user"></i> Обо мне</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../myBlog/view"><i class="fa-brands fa-microblog"></i> Мой блог</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../photos/index"><i class="far fa-images"></i> Фотоальбом</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../contacts/index"><i class="far fa-address-book"></i> Контакты</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../test/index"><i class="far fa-file-alt"></i> Тест</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../guestBook/index"><i class="fa-solid fa-book-open-cover"></i> Гостевая книга</a>
                            </li>
                            <li id="dropMenuInterests" class="nav-item">
                                <a class="nav-link nav-color px-0" href="../myInterests/index"><i class="fas fa-table-tennis"></i> Мои интересы</a>
                                <ul id="myDropdown" class="bg-white p-1">
                                    <li class="nav-item">
                                        <a href="../myInterests/index#mySerial" class="btn btn-outline-primary mb-2" style="font-size: 14px !important;">1. Мои любимые сериалы</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../myInterests/index#myHobby" class="btn btn-outline-primary mb-2" style="font-size: 14px !important;">2. Мои хобби</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../myInterests/index#myBooks" class="btn btn-outline-primary mb-2" style="font-size: 14px !important;">3. Мои любимые книги</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../myInterests/index#myGames" class="btn btn-outline-primary" style="font-size: 14px !important;">4. Мои любимые игры</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <?php
                        if (isset($_SESSION['user']))
                        {
                            echo '<div class="d-flex align-items-center gap-3 authorization-nav">';
                            echo '<span class="nav-font">'.$_SESSION["user"]["name"].'</span>';
                            echo '<a class="navbar-brand" href="../account/login">';
                            echo '<span class="nav-font lazur-outline-btn">Выйти</span>';
                            echo '</a>';
                            echo '</div>';
                        } else
                        {
                            echo '<div class="d-flex authorization-nav">';
                            echo '<a class="navbar-brand" href="../account/login">';
                            echo '<span class="nav-font lazur-outline-btn">Войти</span></a>';
                            echo '<a class="navbar-brand" href="../account/register">';
                            echo '<span class="nav-font lazur-outline-btn">Регистрация</span>';
                            echo '</a>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </nav>
    </header>
    <div class="my-main">
        <div id="mainDiv">
            <div class="d-flex flex-grow-1 justify-content-center mb-2">
                <img id="mySuperPuperAvatar" class="img-center shadow" src="../../public/img/main.jpg" alt="Картинка отсутствует" />
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
    <footer class="footer fixed-bottom bg-dark">
        <div class="container-md text-muted gap-4 d-flex justify-content-center my-2 p-0">
            <a class="footer-contact" href="https://vk.com/alexightgaz" target="_blank"><i class="fab fa-vk"></i></a>
            <a class="footer-contact" href="index.html"><i class="fab fa-telegram-plane"></i></a>
            <span>email: gazukin2002@mail.ru</span>
            <span>tel1.: +7 (978) 777 77 77</span>
            <span>tel2.: +7 (978) 888 88 88</span>
        </div>
    </footer>
    <canvas id="demo-canvas"></canvas>
</div>
<script src="../../public/js/Scripts/clock.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../public/js/avatar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/EasePack.min.js'></script>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/rAF.js'></script>
<script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/TweenLite.min.js'></script>
<script src="../../public/js/script.js"></script>
</body>
</html>