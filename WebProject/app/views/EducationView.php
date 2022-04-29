<link rel='stylesheet' href='../../public/css/image.css'>
<div>
    <header class="border-nav fixed-top navbar-expand-sm">
        <nav class="navbar navbar-light bg-white">
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
                                <a class="nav-link btn-orange px-2" href="../education/index"><i class="fas fa-graduation-cap"></i> Учёба</a>
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
                                <a class="nav-link nav-color px-0" href="../historyViews/index"><i class="fas fa-history"></i> История</a>
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
                            <li id="clock" class="nav-item px-0 py-2"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="d-flex border-common justify-content-center">
        <div class="card pt-3 text-about px-5 container-md">
            <h1 class="card-title d-flex text-about-header justify-content-center mt-2" id="mySerial">Учёба</h1>
            <div>
                <p class="text-about-header">Севастопольский государственный университет</p>
                <p class="text-about-header">Кафедра: Информационные системы</p>
                <table class="table bg-light border mb-4">
                    <thead>
                    <tr>
                        <th colspan="9">
                            <div class="text-center">План учебного процесса</div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th rowspan="2" scope="row" class="text-center">№</th>
                        <td rowspan="2" class="text-center  bold col-4">Дисциплина</td>
                        <td rowspan="2" class="text-center  bold">Кафедра</td>
                        <td colspan="6" class="bold text-center">Всего часов</td>
                    </tr>
                    <tr>
                        <td>Всего</td>
                        <td>Ауд</td>
                        <td>Лк</td>
                        <td>Лб</td>
                        <td>Пр</td>
                        <td>СРС</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Экология</td>
                        <td>БЖ</td>
                        <td>54</td>
                        <td>27</td>
                        <td>18</td>
                        <td>0</td>
                        <td>9</td>
                        <td>27</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Высшая математика</td>
                        <td>ВМ</td>
                        <td>540</td>
                        <td>282</td>
                        <td>141</td>
                        <td>0</td>
                        <td>141</td>
                        <td>258</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Русский язык и культура речи</td>
                        <td>НГиГ</td>
                        <td>108</td>
                        <td>54</td>
                        <td>18</td>
                        <td>0</td>
                        <td>36</td>
                        <td>54</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Основы дискретной математики</td>
                        <td>ИС</td>
                        <td>216</td>
                        <td>139</td>
                        <td>87</td>
                        <td>0</td>
                        <td>52</td>
                        <td>77</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td><a href="./test" class="link text-dark">Основы программирования и алгоритмические языки</a></td>
                        <td>ИС</td>
                        <td>405</td>
                        <td>210</td>
                        <td>105</td>
                        <td>87</td>
                        <td>18</td>
                        <td>195</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Основы экологии</td>
                        <td>ПЭОП</td>
                        <td>54</td>
                        <td>27</td>
                        <td>18</td>
                        <td>0</td>
                        <td>9</td>
                        <td>27</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Теория вероятностей и математическая статистика</td>
                        <td>ИС</td>
                        <td>162</td>
                        <td>72</td>
                        <td>54</td>
                        <td>18</td>
                        <td>0</td>
                        <td>90</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>Физика</td>
                        <td>Физики</td>
                        <td>324</td>
                        <td>194</td>
                        <td>106</td>
                        <td>88</td>
                        <td>0</td>
                        <td>130</td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>Основы электротехники и электронники</td>
                        <td>ИС</td>
                        <td>108</td>
                        <td>72</td>
                        <td>36</td>
                        <td>18</td>
                        <td>18</td>
                        <td>36</td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td>Численные методы в информатике</td>
                        <td>ИС</td>
                        <td>189</td>
                        <td>89</td>
                        <td>36</td>
                        <td>36</td>
                        <td>17</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td>Методы исследования операций</td>
                        <td>ИС</td>
                        <td>216</td>
                        <td>104</td>
                        <td>52</td>
                        <td>35</td>
                        <td>17</td>
                        <td>112</td>
                    </tr>
                    </tbody>
                </table>
                <br>
            </div>
        </div>
    </div>