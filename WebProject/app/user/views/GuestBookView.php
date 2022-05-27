<link rel='stylesheet' href='../../public/css/validInput.css'>
<link rel='stylesheet' href='../../public/css/dateOfBirth.css'>
<link rel='stylesheet' href='../../public/css/popup.css'>
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
                                <a class="nav-link nav-color px-0" href="../education/index"><i class="fas fa-graduation-cap"></i> Учёба</a>
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
                                <a class="nav-link btn-orange px-2" href="../guestBook/index"><i class="fa-solid fa-book-open-cover"></i> Гостевая книга</a>
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
                    }
                    ?>
                </div>
            </div>
        </nav>
    </header>
    <div class="d-flex flex-column mx-5 border-common justify-content-center">
        <div class="some-form">
            <div class="form text-about js-form-validate">
                <h1 class="card-title d-flex text-about-header justify-content-center mt-0">Гостевая книга</h1>
                <h3 class="title text-about-header mt-0 mb-3">Отзывы</h3>
                <form method="post">
                <div class="d-flex flex-column gap-3 text-guestBook pb-3">
                    <?php
                    $records = $vars->getFeedbacksFromFile();
                    foreach ($records as $value) {
                        echo '<div class="card">';
                        echo '<div class="card-header d-flex justify-content-between" style="font-size: 18px">';
                        echo '<div>'.$value["lastName"].' '. $value["firstName"].' '. $value["patronymic"].'</div>';
                        echo '<div>Дата написания: '. $value["date"].'</div>';
                        echo'</div>';
                        echo '<div class="card-body">';
                        echo '<p class="card-text" style="font-weight: 500; font-size: 16px">'.$value["feedback"].'</p>';
                        echo '</div>';
                        echo '</div>';
                    } ?>
                </div>
                <hr />
                <h4 class="title text-about-header mt-0">Написать отзыв</h4>
                <div class="d-flex gap-3">
                    <div class="some-form__line col <?php echo $vars->validator->errMessages['lastName'] ?>">
                        <input id="lastName" value="<?php echo $vars->validated_fields['lastName'] ?>" title="Пример: Иванов" type="text" name="lastName" placeholder="Фамилия *" data-validate>
                        <span class="some-form__hint-succesfull">Отлично</span>
                        <span class="some-form__hint"><?php echo $vars->validator->errMessages['lastNameError'] ?></span>
                    </div>
                    <div class="some-form__line col <?php echo $vars->validator->errMessages['firstName'] ?>">
                        <input id="firstName" value="<?php echo $vars->validated_fields['firstName'] ?>" title="Пример: Иван" type="text" name="firstName" placeholder="Имя *" data-validate>
                        <span class="some-form__hint-succesfull">Отлично</span>
                        <span class="some-form__hint"><?php echo $vars->validator->errMessages['firstNameError'] ?></span>
                    </div>
                    <div class="some-form__line col <?php echo $vars->validator->errMessages['patronymic'] ?>">
                        <input id="patronymic" value="<?php echo $vars->validated_fields['patronymic'] ?>" title="Пример: Иванович" type="text" name="patronymic" placeholder="Отчество *" data-validate>
                        <span class="some-form__hint-succesfull">Отлично</span>
                        <span class="some-form__hint"><?php echo $vars->validator->errMessages['patronymicError'] ?></span>
                    </div>
                </div>
                <div class="some-form__line <?php echo $vars->validator->errMessages['email'] ?>">
                    <input id="mail" title="Пример: ivan@mail.ru" type="email" name="email" placeholder="E-mail *" value="<?php echo $vars->validated_fields['email'] ?>" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint"><?php echo $vars->validator->errMessages['emailError'] ?></span>
                </div>
                <div class="some-form__line <?php echo $vars->validator->errMessages['feedback'] ?>">
                    <textarea id="feedback" type="text" title="Пример: Да он крут!"  name="feedback" placeholder="Отзыв *" data-validate rows="5"><?php echo $vars->validated_fields['feedback'] ?></textarea>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint"><?php echo $vars->validator->errMessages['feedbackError'] ?></span>
                </div>
                <div class="d-flex gap-3 some-form__submit align-items-center pt-3">
                    <input id="formSubmit" type="submit" value="Оставить отзыв" class="button button_submit button-wide">
                    <button type="reset" value="reset" class="button_submit inter-button-text button-wide">Очистить поля</button>
                </div>
            </form>
            </div>
        </div>
    </div>