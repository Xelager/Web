<link rel='stylesheet' href='../../public/css/validInput.css'>
<link rel='stylesheet' href='../../public/css/dateOfBirth.css'>
<link rel='stylesheet' href='../../public/css/popup.css'>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>
<div>
    <header class="border-nav fixed-top navbar-expand-sm">
        <nav class="navbar navbar-light bg-white">
            <div id="clock" class="navbar-brand-font px-0 py-2"></div>
            <div class="main-container align-content-center justify-content-center">
                <div class="d-flex align-items-center py-2">
                    <div>
                        <a class="navbar-brand" href="/">
                            <img src="../../public/img/Avatar.jpg" class="nav-image" alt="myAvatar">
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
    <div class="d-flex flex-column mx-5 border-common justify-content-center align-items-center authorization-container">
        <div class="some-form">
            <form method="post" class="form text-about js-form-validate">
                <h1 class="card-title d-flex text-about-header justify-content-center pb-3 mt-0">Регистрация</h1>
                <div class="some-form__line <?php echo $vars->validator->errMessages['login'] ?>">
                    <input id="login" value="<?php echo $vars->validated_fields['login'] ?>" type="text" name="login" placeholder="Уникальный логин*" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint"><?php echo $vars->validator->errMessages['loginError'] ?></span>
                </div>
                <div class="some-form__line <?php echo $vars->validator->errMessages['email'] ?>">
                    <input id="mail" title="Пример: ivan@mail.ru" type="email" name="email" placeholder="E-mail*" value="<?php echo $vars->validated_fields['email'] ?>" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint"><?php echo $vars->validator->errMessages['emailError'] ?></span>
                </div>
                <div class="some-form__line <?php echo $vars->validator->errMessages['password'] ?>">
                    <input  id="password" type="password" name="password" placeholder="Пароль*" value="<?php echo $vars->validated_fields['password'] ?>" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint"><?php echo $vars->validator->errMessages['passwordError'] ?></span>
                </div>
                <div class="some-form__line">
                    <input  id="name" type="text" name="name" value="<?php echo $vars->validated_fields['name'] ?>" placeholder="Ваше имя" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint"></span>
                </div>
                <?php
                    if (isset($vars2["error"]))
                    {
                        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
                        echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
                        echo '<div>';
                        echo $vars2["error"];
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
                <div class="some-form__line pt-3">
                    <a href="login" class="d-flex justify-content-end text-guestBook">Вы уже зарегистрированы?</a>
                </div>
                <div class="d-flex gap-3 some-form__submit align-items-center justify-content-center">
                    <input id="formSubmit" type="submit" value="Зарегистрироваться" class="button button_submit button-wide">
                </div>
            </form>
        </div>
    </div>