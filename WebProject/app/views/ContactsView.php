<link rel='stylesheet' href='../../public/css/validInput.css'>
<link rel='stylesheet' href='../../public/css/dateOfBirth.css'>
<link rel='stylesheet' href='../../public/css/popup.css'>
<div>
    <header class="border-nav fixed-top navbar-expand-sm">
        <nav class="navbar navbar-light bg-white">
            <div class="container-fluid align-content-center justify-content-center">
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
                                <a class="nav-link nav-color px-0" href="./aboutMe"><i class="fas fa-user"></i> Обо мне</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="./education"><i class="fas fa-graduation-cap"></i> Учёба</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="./photos"><i class="far fa-images"></i> Фотоальбом</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-orange px-2" href="./contacts"><i class="far fa-address-book"></i> Контакты</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="./test"><i class="far fa-file-alt"></i> Тест</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="./history"><i class="fas fa-history"></i> История</a>
                            </li>
                            <li id="dropMenuInterests" class="nav-item">
                                <a class="nav-link nav-color px-0" href="./myInterests"><i class="fas fa-table-tennis"></i> Мои интересы</a>
                                <ul id="myDropdown" class="bg-white p-1">
                                    <li class="nav-item">
                                        <a href="./myInterests#mySerial" class="btn btn-outline-primary mb-2" style="font-size: 14px !important;">1. Мои любимые сериалы</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./myInterests#myHobby" class="btn btn-outline-primary mb-2" style="font-size: 14px !important;">2. Мои хобби</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./myInterests#myBooks" class="btn btn-outline-primary mb-2" style="font-size: 14px !important;">3. Мои любимые книги</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./myInterests#myGames" class="btn btn-outline-primary" style="font-size: 14px !important;">4. Мои любимые игры</a>
                                    </li>
                                </ul>
                            </li>
                            <li id="clock" class="nav-item px-0 py-2"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="d-flex flex-column mx-5 border-common justify-content-center" style="padding-bottom: 6em;">
        <div class="some-form">
            <form class="form js-form-validate" action="mailto:gazukin2002@mail.ru">
                <h1 class="some-form__header title text-about-header mt-0">Мой контакт</h1>
                <div class="some-form__line">
                    <input id="FioId" title="Пример: Иванов Иван Иванович" onblur="validationFioOnBlur()" onfocus="elementOnFocus(this)" type="text" name="FIO" placeholder="Ваше ФИО *" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint">Обязательно для заполнения</span>
                    <span class="some-form__hint-example">Некорректный ввод, пример: "Иванов Иван Иванович"</span>
                </div>
                <div class="some-form__line">
                    <input id="mail" title="Пример: ivan@mail.ru" type="email" onblur="validationMailOnBlur()" onfocus="elementOnFocus(this)" name="mail" placeholder="E-mail *" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint">Обязательно для заполнения</span>
                    <span class="some-form__hint-example">Некорректный ввод, пример: "ivan@mail.ru"</span>
                </div>
                <div class="some-form__line">
                    <input id="phone" type="tel" title="Пример: +79788888888" onblur="validationPhoneOnBlur()" onfocus="elementOnFocus(this)" name="phone" placeholder="Телефон *" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint">Обязательно для заполнения</span>
                    <span class="some-form__hint-example">Некорректный ввод, пример: "+79788888888"</span>
                </div>
                <div class="d-flex gap-5">
                    <div class="custom-radio text-about-min">
                        <span class="text-about">Выберите пол *:</span>
                        <div class="custom-control some-form__line mt-3">
                            <input type="radio" class="custom-control-input" value="man" id="maleId" name="radio-stacked" required>
                            <label class="custom-control-label" for="maleId">Мужской пол</label>
                        </div>
                        <div class="custom-control some-form__line">
                            <input type="radio" class="custom-control-input" value="female" id="femaleId" name="radio-stacked" required>
                            <label class="custom-control-label" for="femaleId">Женский пол</label>
                        </div>
                        <div class="custom-control some-form__line">
                            <input type="radio" class="custom-control-input" value="other" id="otherId" name="radio-stacked" required>
                            <label class="custom-control-label" for="otherId">Другое</label>
                        </div>
                    </div>
                    <div class="date-picker">
                        <div class="text-about selected-date"></div>

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
                    </div>
                </div>
                <div class="d-flex gap-3 some-form__submit align-items-center">
                    <button id="formSubmit" type="button" value="Отправить" class="button button_submit button-wide" disabled>Отправить</button>
                    <button type="reset" value="reset" class="button_submit inter-button-text button-wide">Очистить поля</button>
                </div>
            </form>
        </div>
    </div>