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
                                <a class="nav-link nav-color px-0" href="../myBlog/view"><i class="fa-brands fa-microblog"></i> Мой блог</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-orange px-2" href="../history/index"><i class="fas fa-history"></i> История</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../guestBook/index"><i class="fa-solid fa-book-open-cover"></i> Гостевая книга</a>
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
                <h1 class="card-title d-flex text-about-header justify-content-center mt-0 mb-3">История пользователей</h1>
                <div class="d-flex flex-column gap-3 text-guestBook pb-3">
                    <?php
                    $records = $vars->getRecords(20);
                    foreach ($records as $value) {
                        echo '<div class="card">';
                        echo '<div class="card-header d-flex justify-content-between" style="font-size: 18px">';
                        echo '<div>Логин: ' .$value->userLogin.'</div>';
                        echo '<div>Дата: '. $value->date.'</div>';
                        echo'</div>';
                        echo '<div class="card-body">';
                        echo '<p class="card-text" style="font-weight: 500; font-size: 16px">Ip = '.$value->ip.'</p>';
                        echo '<p class="card-text" style="font-weight: 500; font-size: 16px">Host = '.$value->host.'</p>';
                        echo '<p class="card-text" style="font-weight: 500; font-size: 16px">Page = '.$value->page.'</p>';
                        echo '<p class="card-text" style="font-weight: 500; font-size: 16px">Browser = '.$value->browser.'</p>';
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
                                echo '<a class="page-link" type="button" onclick="location=\'../history/index?number=' . ($vars->numberPage - 1) . '\'">Предыдущий</a>';
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
                            echo '<a class="page-link" type="button" onclick="location=\'../history/index?number=' . $i . '\'">'. ($i + 1) .'</a>';
                        } ?>
                        <li class="page-item <?php if ($vars->numberPage + 1 > $vars->countPages) echo 'disabled'; ?>">
                            <?php  if ($vars->numberPage + 1 > $vars->countPages)
                            {
                                echo '<a class="page-link" tabindex="-1" aria-disabled="true">Следующий</a>';

                            } else {
                                echo '<a class="page-link" type="button" onclick="location=\'../history/index?number=' . ($vars->numberPage + 1) . '\'">Следующий</a>';
                            } ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>