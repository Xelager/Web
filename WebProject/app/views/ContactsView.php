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
                                <a class="nav-link nav-color px-0" href="../photos/index"><i class="far fa-images"></i> Фотоальбом</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-orange px-2" href="../contacts/index"><i class="far fa-address-book"></i> Контакты</a>
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
    <div class="d-flex flex-column mx-5 border-common justify-content-center">
        <div class="some-form">
            <form method="post" class="form text-about js-form-validate">
                <h1 class="card-title d-flex text-about-header justify-content-center mt-0">Мой контакт</h1>
                <div class="some-form__line <?php echo $vars->validator->errMessages['FIO'] ?>">
                    <input id="FioId" value="<?php echo $vars->validated_fields['FIO'] ?>" title="Пример: Иванов Иван Иванович" type="text" name="FIO" placeholder="Ваше ФИО *" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint"><?php echo $vars->validator->errMessages['FIOError'] ?></span>
                </div>
                <div class="some-form__line <?php echo $vars->validator->errMessages['email'] ?>">
                    <input id="mail" title="Пример: ivan@mail.ru" type="email" name="email" placeholder="E-mail *" value="<?php echo $vars->validated_fields['email'] ?>" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint"><?php echo $vars->validator->errMessages['emailError'] ?></span>
                </div>
                <div class="some-form__line <?php echo $vars->validator->errMessages['phone'] ?>">
                    <input  id="phone" type="tel" title="Пример: +79788888888"  name="phone" placeholder="Телефон *" value="<?php echo $vars->validated_fields['phone'] ?>" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint"><?php echo $vars->validator->errMessages['phoneError'] ?></span>
                </div>
                <div class="d-flex gap-5 some-form__line <?php echo $vars->validator->errMessages['gender'] ?>">
                    <div class="custom-radio text-about-min">
                        <span class="text-about">Выберите пол *:</span>
                        <div class="custom-control some-form__line mt-3">
                            <input type="radio" class="custom-control-input" value="man" id="maleId" name="gender" <?php if (trim($vars->validated_fields['gender']) && ($vars->validated_fields['gender'] == "men")) {echo "checked";} ?>>
                            <label class="custom-control-label" for="maleId">Мужской пол</label>
                        </div>
                        <div class="custom-control some-form__line">
                            <input type="radio" class="custom-control-input" value="female" id="femaleId" name="gender" <?php if (trim($vars->validated_fields['gender']) && ($vars->validated_fields['gender'] == "female")) {echo "checked";} ?>>
                            <label class="custom-control-label" for="femaleId">Женский пол</label>
                        </div>
                        <div class="custom-control some-form__line">
                            <input type="radio" class="custom-control-input" value="other" id="otherId" name="gender" <?php if (trim($vars->validated_fields['gender']) && ($vars->validated_fields['gender'] == "other")) {echo "checked";} ?>>
                            <label class="custom-control-label mb-3" for="otherId">Другое</label>
                            <span class="some-form__hint-succesfull mb-3">Отлично</span>
                            <span class="some-form__hint mb-3"><?php echo $vars->validator->errMessages['genderError'] ?></span>
                        </div>
                    </div>
                    <div class="date-picker some-form__line <?php echo $vars->validator->errMessages['birthDate'] ?>">
                        <input name="birthDate" class="text-about selected-date" value="<?php echo $vars->validated_fields['birthDate'] ?>">

                        <div class="dates">
                            <div class="month">
                                <div class="arrows prev-mth">&lt;</div>
                                <div class="mth"></div>
                                <div class="arrows next-mth">&gt;</div>
                            </div>
                            <div class="d-flex gap-2">
                                <select id="yearId" class="form-control">
                                    <option value="" disabled selected>Год</option>
                                </select>
                                <select id="monthId" class="form-control">
                                    <option value="" disabled selected>Месяц</option>
                                </select>
                            </div>
                            <div class="days"></div>
                        </div>
                        <span class="some-form__hint-succesfull mb-3">Отлично</span>
                        <span class="some-form__hint mb-3"><?php echo $vars->validator->errMessages['birthDateError'] ?></span>
                    </div>
                </div>
                <div class="d-flex gap-3 some-form__submit align-items-center">
                    <input id="formSubmit" type="submit" value="Отправить" class="button button_submit button-wide">
                    <button type="reset" value="reset" class="button_submit inter-button-text button-wide">Очистить поля</button>
                </div>
            </form>
        </div>
    </div>