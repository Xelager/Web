<link rel='stylesheet' href='../../public/css/image.css'>
<div>
    <header class="border-nav fixed-top navbar-expand-sm">
        <nav class="navbar navbar-light bg-white">
            <div id="clock" class="navbar-brand-font px-0 py-2"></div>
            <div class="container-fluid align-content-center justify-content-center">
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
                                <a class="nav-link btn-orange px-2" href="../history/index"><i class="fas fa-history"></i> История</a>
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
                </div>
            </div>
        </nav>
    </header>
    <div class="d-flex border-common justify-content-center">
        <div class="card pt-3 text-about px-5 container-md">
            <h1 class="card-title d-flex text-about-header justify-content-center mt-2" id="mySerial">История просмотров</h1>
            <div>
                <table class="table bg-light border mb-4">
                    <thead>
                    <tr>
                        <th colspan="9">
                            <div class="text-center">История за всё время</div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th rowspan="1" scope="row" class="text-center">№</th>
                        <td rowspan="1" class="text-center bold col-4">Сайт</td>
                        <td rowspan="1" class="text-center bold">Количество посещений</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Главная страница</td>
                        <td id="indexViewId"></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Обо мне</td>
                        <td id="aboutMeViewId"></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Учёба</td>
                        <td id="educationViewId"></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Фотоальбом</td>
                        <td id="photosViewId"></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Контакты</td>
                        <td id="contactsViewId"></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Тест</td>
                        <td id="testViewId"></td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Мои интересы</td>
                        <td id="interestsViewId"></td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <table class="table bg-light border mb-4">
                    <thead>
                    <tr>
                        <th colspan="9">
                            <div class="text-center">История текущего сеанса</div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th rowspan="1" scope="row" class="text-center">№</th>
                        <td rowspan="1" class="text-center  bold col-4">Сайт</td>
                        <td rowspan="1" class="text-center  bold">Просмотров</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Главная страница</td>
                        <td id="indexId"></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Обо мне</td>
                        <td id="aboutMeId"></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Учёба</td>
                        <td id="educationId"></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Фотоальбом</td>
                        <td id="photosId"></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Контакты</td>
                        <td id="contactsId"></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Тест</td>
                        <td id="testId"></td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Мои интересы</td>
                        <td id="interestsId"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>