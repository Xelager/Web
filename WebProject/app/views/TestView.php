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
                                <a class="nav-link nav-color px-0" href="../aboutMe"><i class="fas fa-user"></i> Обо мне</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../myBlog"><i class="fa-brands fa-microblog"></i> Мой блог</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../education"><i class="fas fa-graduation-cap"></i> Учёба</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../photos"><i class="far fa-images"></i> Фотоальбом</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../contacts"><i class="far fa-address-book"></i> Контакты</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-orange px-2" href="../test"><i class="far fa-file-alt"></i> Тест</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../history"><i class="fas fa-history"></i> История</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../guestBook/index"><i class="fa-solid fa-book-open-cover"></i> Гостевая книга</a>
                            </li>
                            <li id="dropMenuInterests" class="nav-item">
                                <a class="nav-link nav-color px-0" href="../myInterests"><i class="fas fa-table-tennis"></i> Мои интересы</a>
                                <ul id="myDropdown" class="bg-white p-1">
                                    <li class="nav-item">
                                        <a href="../myInterests#mySerial" class="btn btn-outline-primary mb-2" style="font-size: 14px !important;">1. Мои любимые сериалы</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../myInterests#myHobby" class="btn btn-outline-primary mb-2" style="font-size: 14px !important;">2. Мои хобби</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../myInterests#myBooks" class="btn btn-outline-primary mb-2" style="font-size: 14px !important;">3. Мои любимые книги</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../myInterests#myGames" class="btn btn-outline-primary" style="font-size: 14px !important;">4. Мои любимые игры</a>
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
            <form method="post" class="form text-about js-form-validate">
                <h1 class="card-title d-flex text-about-header justify-content-center mt-0">Тест</h1>
                <h2 class="text-dark text-center">Основы программирования и алгоритмические языки</h2>
                <div class="form-group some-form__line <?php echo $vars->validator->errMessages['question1'] ?>">
                    <div class="mb-1">1) Числовые данные могут быть представлены как:</div>
                    <select id="answerState" class="form-control" name="question1" >
                        <option value="" <?php if ($vars->validated_fields['question1'] == "") echo "selected" ?> disabled>Выберите из списка</option>
                        <option id="1answerState" value="1answerState" <?php if ($vars->validated_fields['question1'] == "1answerState") echo "selected" ?>>1. целые</option>
                        <option id="2answerState" value="2answerState" <?php if ($vars->validated_fields['question1'] == "2answerState") echo "selected" ?>>2. с фиксированной точкой</option>
                        <option id="3answerState" value="3answerState" <?php if ($vars->validated_fields['question1'] == "3answerState") echo "selected" ?>>3. в виде строк</option>
                        <option id="4answerState" value="4answerState" <?php if ($vars->validated_fields['question1'] == "4answerState") echo "selected" ?>>4. с плавающей точкой.</option>
                    </select>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint"><?php echo $vars->validator->errMessages['question1Error'] ?></span>
                </div>
                <br>
                <div class="form-group some-form__line <?php echo $vars->validator->errMessages['question2'] ?>">
                    <div class="mb-1">2) Введите определение алгоритма по Маркову.</div>
                    <textarea class="form-control" placeholder="Введите Ваш ответ *" rows="5" name="question2" data-validate><?php echo $vars->validated_fields['question2'] ?></textarea>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint"><?php echo $vars->validator->errMessages['question2Error'] ?></span>
                </div>
                <br>
                <div class="form-group some-form__line <?php echo $vars->validator->errMessages['question3'] ?>">
                    <div class="mb-1">3) Какие языки называются алгоритмическими?</div>
                    <div class="custom-radio">
                        <div class="custom-control">
                            <input type="radio" class="custom-control-input" id="answer1" value="answer1" name="question3"  <?php if (trim($vars->validated_fields['question3']) && ($vars->validated_fields['question3'] == "answer1")) {echo "checked";} ?>>
                            <label class="custom-control-label" for="answer1">1) Формальные языки, специально разработанные для записи алгоритмов.</label>
                        </div>
                        <div class="custom-control">
                            <input type="radio" class="custom-control-input" id="answer2" value="answer2" name="question3" <?php if (trim($vars->validated_fields['question3']) && ($vars->validated_fields['question3'] == "answer2")) {echo "checked";} ?> >
                            <label class="custom-control-label" for="answer2">2) Обыкновенные языки, которые используются для записи алгоритмов.</label>
                        </div>
                        <div class="custom-control">
                            <input type="radio" class="custom-control-input" id="answer3" value="answer3" name="question3" <?php if (trim($vars->validated_fields['question3']) && ($vars->validated_fields['question3'] == "answer3")) {echo "checked"; }?>>
                            <label class="custom-control-label" for="answer3">3) Формальные языки, специально переработанные для описания алгоритмов.</label>
                        </div>
                    </div>
                    <span class="some-form__hint-succesfull my-2">Отлично</span>
                    <span class="some-form__hint my-2"><?php echo $vars->validator->errMessages['question3Error'] ?></span>
                </div>
                <br>
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
                <div class="d-flex gap-3 some-form__submit align-items-center">
                    <button type="submit" value="Отправить" class="button button_submit button-wide">Отправить</button>
                    <button type="reset" value="reset" class="button_submit inter-button-text button-wide">Очистить поля</button>
                </div>
            </form>
        </div>
    </div>