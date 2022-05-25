<link rel='stylesheet' href='../../public/css/validInput.css'>
<link rel='stylesheet' href='../../public/css/dateOfBirth.css'>
<link rel='stylesheet' href='../../public/css/popup.css'>
<div>
    <header class="border-nav fixed-top navbar-expand-sm">
        <nav class="navbar navbar-light bg-white">
            <div id="clock" class="navbar-brand-font px-0 py-2"></div>
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
                                <a class="nav-link nav-color px-0" href="../aboutMe/index"><i class="fas fa-user"></i> Обо мне</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-orange px-2" href="../myBlog/view"><i class="fa-brands fa-microblog"></i> Мой блог</a>
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
    <div class="d-flex flex-column mx-5 border-common justify-content-center">
        <div class="some-form">
            <div class="form text-about js-form-validate">
                <h1 class="card-title d-flex text-about-header justify-content-center mt-0 mb-3">Мой блог</h1>
                <?php include 'app/views/InputCSVFileView.php'; ?>
                <a class="btn btn-primary mb-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Редактор блога
                </a>
                <div class="collapse mb-4" id="collapseExample">
                    <div class="card card-body">
                        <?php include 'app/views/EditBlogView.php'; ?>
                    </div>
                </div>
                <div class="d-flex flex-column gap-3 text-guestBook pb-3">
                    <?php
                    $records = $vars->getRecords(10);
                    foreach ($records as $value) {
                        echo '<div class="card">';
                        echo '<div class="card-header d-flex justify-content-between" style="font-size: 18px">';
                        echo '<div>Название: ' .$value->title.'</div>';
                        echo '<div>Дата написания: '. $value->createdAt.'</div>';
                        echo'</div>';
                        echo '<div class="card-body">';
                        if (trim($value->imageUrl))
                        {
                            echo '<img src="'. $value->imageUrl. '" class="image-blog my-3 mx-auto d-block" alt="Картинки не существует">';
                        }
                        echo '<p class="card-text" style="font-weight: 500; font-size: 16px">'.$value->content.'</p>';
                        echo '</div>';
                        echo '</div>';
                    } ?>
                </div>
                <nav aria-label="Page navigation" class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item <?php if ($vars->numberPage - 1 < 0) echo 'disabled'; ?>" >
                            <?php  if ($vars->numberPage - 1 < 0)
                                {
                                    echo '<a class="page-link" tabindex="-1" aria-disabled="true">Предыдущий</a>';

                                } else {
                                echo '<a class="page-link" type="button" onclick="location=\'../myBlog/view?number=' . ($vars->numberPage - 1) . '\'">Предыдущий</a>';
                            } ?>
                        </li>
                        <?php
                        for ($i = 0; $i <= $vars->countPages; $i++) {
                            if ($i == $vars->numberPage)
                            {
                                echo '<li class="page-item  active" aria-current="page">';
                            } else {
                                echo '<li class="page-item" aria-current="page">';
                            }
                            echo '<a class="page-link" type="button" onclick="location=\'../myBlog/view?number=' . $i . '\'">'. ($i + 1) .'</a>';
                        } ?>
                        <li class="page-item <?php if ($vars->numberPage + 1 > $vars->countPages) echo 'disabled'; ?>">
                            <?php  if ($vars->numberPage + 1 > $vars->countPages)
                            {
                                echo '<a class="page-link" tabindex="-1" aria-disabled="true">Следующий</a>';

                            } else {
                                echo '<a class="page-link" type="button" onclick="location=\'../myBlog/view?number=' . ($vars->numberPage + 1) . '\'">Следующий</a>';
                            } ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>