<link rel='stylesheet' href='../../public/css/image.css'>
<div class="popup-fade">
    <div class="popup d-flex flex-column gap-2 align-items-center">
        <div class="d-flex justify-content-center">
            <img id="bigPhoto" src='#' class='popup-img'/>
        </div>
        <div class="d-flex bg-dark px-3 icon-div">
            <i id="left-arrow" class="fas fa-arrow-left fa-5x icon-img margin-icon"></i>
            <i id="right-arrow" class="fas fa-arrow-right fa-5x icon-img"></i>
        </div>
    </div>
</div>

<div>
    <header class="border-nav fixed-top navbar-expand-sm">
        <nav class="navbar navbar-light bg-white">
            <div id="clock" class="navbar-brand-font px-0 py-2"></div>
            <div class="main-container align-content-center justify-content-center">
                <div class="d-flex align-items-center py-2">
                    <div>
                        <a class="navbar-brand" href="/">
                            <img src="../../public/img/Avatar.jpg" class="nav-image">
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
                                <a class="nav-link btn-orange px-2" href="../photos/index"><i class="far fa-images"></i> Фотоальбом</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../contacts/index"><i class="far fa-address-book"></i> Контакты</a>
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
                    <div class="d-flex authorization-nav">
                        <a class="navbar-brand" href="../account/login">
                            <span class="nav-font lazur-outline-btn">Войти</span>
                        </a>
                        <a class="navbar-brand" href="../account/register">
                            <span class="nav-font lazur-outline-btn">Регистрация</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="mx-3 my-5 py-5">
        <?php
        $count = 0;
        $elemsOnLine = 5;
        $photos = $vars->getPhoto();
        foreach ($photos as $key => $photo) {
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
        ?>
    </div>
    </div>
