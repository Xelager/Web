<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dropDownMenuInterests.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/validInput.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Gemunu+Libre:wght@700&family=Inter:wght@500;600;700&family=Open+Sans:ital,wght@1,500;1,600&display=swap" rel="stylesheet">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/jquery.inputmask.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/myInterestsDropMenu.js') }}"></script>
    <script src="{{ asset('assets/js/clock.js') }}"></script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    <script src="{{ asset('assets/js/returnData/navBar.js') }}"></script>
    <title>@yield('title')</title>
</head>
<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
?>
<body>
<div id="large-header" class="large-header">
    <header class="border-nav fixed-top navbar-expand-sm">
        <nav class="navbar navbar-light bg-white">
            <div id="clock" class="navbar-brand-font px-0 py-2"></div>
            <div class="main-container align-content-center justify-content-center">
                <div class="d-flex align-items-center py-2">
                    <div>
                        <a class="navbar-brand" href="/">
                            <img src="{{ asset('assets/img/Avatar.jpg') }}" class="nav-image" alt="myAvatar">
                            <span class="navbar-brand-font btn-lazur">Gazukin</span>
                        </a>
                    </div>
                    <div>
                        <ul class="nav gap-3 nav-font">
                            <li class="nav-item">
                                <a id="aboutMe" class="nav-link nav-color px-0" href="../aboutMe"><i class="fas fa-user"></i> Обо мне</a>
                            </li>
                            <li class="nav-item">
                                <a id="blog" class="nav-link nav-color px-0" href="../blog"><i class="fa-brands fa-microblog"></i> Мой блог</a>
                            </li>
                            <li class="nav-item">
                                <a id="gallery" class="nav-link nav-color px-0" href="../gallery"><i class="far fa-images"></i> Фотоальбом</a>
                            </li>
                            <li id="dropMenuInterests" class="nav-item">
                                <a id="interests" class="nav-link nav-color px-0" href="../interests"><i class="fas fa-table-tennis"></i> Мои интересы</a>
                                <ul id="myDropdown" class="bg-white p-1">
                                    <li class="nav-item">
                                        <a href="../interests#mySerial" class="btn btn-outline-primary mb-2" style="font-size: 14px !important;">1. Мои любимые сериалы</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../interests#myHobby" class="btn btn-outline-primary mb-2" style="font-size: 14px !important;">2. Мои хобби</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../interests#myBooks" class="btn btn-outline-primary mb-2" style="font-size: 14px !important;">3. Мои любимые книги</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../interests#myGames" class="btn btn-outline-primary" style="font-size: 14px !important;">4. Мои любимые игры</a>
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
                        echo '<a class="navbar-brand" href="../logout">';
                        echo '<span class="nav-font lazur-outline-btn">Выйти</span>';
                        echo '</a>';
                        echo '</div>';
                    } else
                    {
                        echo '<div class="d-flex authorization-nav">';
                        echo '<a class="navbar-brand" href="../login">';
                        echo '<span class="nav-font lazur-outline-btn">Войти</span></a>';
                        echo '<a class="navbar-brand" href="../register">';
                        echo '<span class="nav-font lazur-outline-btn">Регистрация</span>';
                        echo '</a>';
                        echo '</div>';
                    }
                    ?>
{{--                    @auth--}}
{{--                        <div class="d-flex align-items-center gap-3 authorization-nav">--}}
{{--                        <span class="nav-font">{{ Auth::user()->name }}</span>--}}
{{--                        <a class="navbar-brand" href="../logout">--}}
{{--                        <span class="nav-font lazur-outline-btn">Выйти</span>--}}
{{--                        </a>--}}
{{--                        </div>--}}
{{--                    @endauth--}}
{{--                    @guest--}}
{{--                        <div class="d-flex authorization-nav">--}}
{{--                        <a class="navbar-brand" href="../login">--}}
{{--                        <span class="nav-font lazur-outline-btn">Войти</span></a>--}}
{{--                        <a class="navbar-brand" href="../register">--}}
{{--                        <span class="nav-font lazur-outline-btn">Регистрация</span>--}}
{{--                        </a>--}}
{{--                        </div>--}}
{{--                    @endguest--}}
                </div>
            </div>
        </nav>
    </header>
    <script>
        if ('<?php echo Route::currentRouteName(); ?>')
        {
            var currentRoute = '<?php echo (Route::currentRouteName()); ?>';
            routeArray.forEach(route =>
            {
               if (route === currentRoute)
               {
                   $("#" + route).removeClass( "nav-color px-0" ).addClass( "btn-orange px-2" );
               }
            });
        }
    </script>
@yield('main-content')
<footer class="footer fixed-bottom bg-dark">
    <div class="container-md text-muted gap-4 d-flex justify-content-center my-2 p-0">
        <a class="footer-contact" href="https://vk.com/alexightgaz" target="_blank"><i class="fab fa-vk"></i></a>
        <a class="footer-contact" href="/"><i class="fab fa-telegram-plane"></i></a>
        <span>email: gazukin2002@mail.ru</span>
        <span>tel1.: +7 (978) 777 77 77</span>
        <span>tel2.: +7 (978) 888 88 88</span>
    </div>
</footer>
</div>
</body>
</html>
