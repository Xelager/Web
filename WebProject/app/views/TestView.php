<link rel='stylesheet' href='../../public/css/validInput.css'>
<div>
    <header class="border-nav fixed-top navbar-expand-sm">
        <nav class="navbar navbar-light bg-white">
            <div class="container-fluid align-content-center justify-content-center">
                <div class="d-flex align-items-center py-2">
                    <div>
                        <a class="navbar-brand" href="/">
                            <img src="../../public/img/Avatar.jpg" class="nav-image" alt="Image was not found.">
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
                                <a class="nav-link nav-color px-0" href="./contacts"><i class="far fa-address-book"></i> Контакты</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-orange px-2" href="./test"><i class="far fa-file-alt"></i> Тест</a>
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
    <div class="d-flex flex-column mx-5 border-common justify-content-center">
        <div class="some-form">
            <form class="form text-about js-form-validate" action="mailto:gazukin2002@mail.ru">
                <h1 class="card-title d-flex text-about-header justify-content-center mt-0">Тест</h1>
                <h2 class="text-dark text-center">Основы программирования и алгоритмические языки</h2>
                <div class="form-group">
                    <div class="mb-1">1) Числовые данные могут быть представлены как:</div>
                    <select id="answState" class="form-control" required>
                        <option value="" disabled selected>Выберите из списка</option>
                        <option id="1answState">1. целые</option>
                        <option id="2answState">2. с фиксированной точкой</option>
                        <option id="3answState">3. в виде строк</option>
                        <option id="4answState">4. с плавающей точкой.</option>
                    </select>
                </div>
                <br>
                <div class="form-group some-form__line">
                    <div class="mb-1">2) Введите определение алгоритма по Маркову.</div>
                    <textarea class="form-control" placeholder="Введите Ваш ответ *" rows="5" data-validate></textarea>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint">Обязательно для заполнения</span>
                    <span class="some-form__hint-example">Некорректный ввод, не менее 30 слов</span>
                </div>
                <br>
                <div class="form-group">
                    <div class="mb-1">3) Какие языки называются алгоритмическими?</div>
                    <div class="custom-radio">
                        <div class="custom-control">
                            <input type="radio" class="custom-control-input" id="answ1" name="radio-stacked" required>
                            <label class="custom-control-label" for="answ1">1) Формальные языки, специально разработанные для записи алгоритмов.</label>
                        </div>
                        <div class="custom-control">
                            <input type="radio" class="custom-control-input" id="answ2" name="radio-stacked" required>
                            <label class="custom-control-label" for="answ2">2) Обыкновенные языки, которые используются для записи алгоритмов.</label>
                        </div>
                        <div class="custom-control">
                            <input type="radio" class="custom-control-input" id="answ3" name="radio-stacked" required>
                            <label class="custom-control-label" for="answ3">3) Формальные языки, специально переработанные для описания алгоритмов.</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="some-form__line">
                    <input type="text" name="FIO" placeholder="Ваше ФИО *" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint">Обязательно для заполнения</span>
                    <span class="some-form__hint-example">Некорректный ввод, пример: "Иванов Иван Иванович"</span>
                </div>
                <div class="some-form__line">
                    <input type="email" name="mail" placeholder="E-mail *" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint">Обязательно для заполнения</span>
                    <span class="some-form__hint-example">Некорректный ввод, пример: "ivan@mail.ru"</span>
                </div>
                <div class="d-flex gap-3 some-form__submit align-items-center">
                    <button type="submit" value="Отправить" class="button button_submit button-wide">Отправить</button>
                    <button type="reset" value="reset" class="button_submit inter-button-text button-wide">Очистить поля</button>
                </div>
            </form>
        </div>
    </div>