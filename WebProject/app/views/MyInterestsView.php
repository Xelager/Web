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
                                <a class="nav-link nav-color px-0" href="../history/index"><i class="fas fa-history"></i> История</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../guestBook/index"><i class="fa-solid fa-book-open-cover"></i> Гостевая книга</a>
                            </li>
                            <li id="dropMenuInterests" class="nav-item">
                                <a class="nav-link btn-orange px-2" href="../myInterests/index"><i class="fas fa-table-tennis"></i> Мои интересы</a>
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
    <div class="btn-group d-flex flex-column mx-4 text-about-header anchor" role="group" aria-label="Basic radio toggle button group">
        <a href="#top" class="btn btn-outline-warning" style="font-size: 18px !important;">Вверх</a>
        <a href="#mySerial" class="btn btn-outline-warning" style="font-size: 18px !important;">1. Мои любимые сериалы</a>
        <a href="#myHobby" class="btn btn-outline-warning" style="font-size: 18px !important;">2. Мои хобби</a>
        <a href="#myBooks" class="btn btn-outline-warning" style="font-size: 18px !important;">3. Мои любимые книги</a>
        <a href="#myGames" class="btn btn-outline-warning" style="font-size: 18px !important;">4. Мои любимые игры</a>
    </div>
    <div class="d-flex border-common justify-content-center">
        <div class="card text-about margin-text">
            <div class="card-body mx-3">
              <h1 class="card-title d-flex text-about-header justify-content-center mt-2" id="mySerial">Мои интересы</h1>
              <div class="mb-3">
                <?php
                $myInterests = $vars->getData();
                foreach ($myInterests as $key => $myInterest) {
                  echo '<h3 class="card-text d-flex text-about-header mt-5">'.$key.'</h3>';
                  echo $myInterest['content'];
                  $elemsOnLine = 3;
                  $count = 0;
                  echo '<div class="d-flex flex-column gap-3">';
                  foreach ($myInterest['photos'] as $key => $photo) {
                      if ($count % $elemsOnLine === 0) {
                          echo '<div class="d-flex justify-content-around">';
                      }

                      echo '<div class="row gap-3 image-interest align-self-end">';
                      echo '<img src="'.$photo['path'].'" alt="The image was not found" />';
                      echo '<span class="text-about-header"  id="'.$photo['id'].'">'.$photo['name'].'</span>';
                      echo '</div>';
                      if ($count % $elemsOnLine === ($elemsOnLine - 1)) {
                          echo '</div>';
                      }
                      $count++;
                  }
                  echo '</div>';
                }
                 ?>
            </div>
        </div>
    </div>
