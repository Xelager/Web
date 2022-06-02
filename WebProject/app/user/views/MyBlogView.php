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
                                <a class="nav-link nav-color px-0" href="../aboutMe/index"><i class="fas fa-user"></i>
                                    Обо мне</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-orange px-2" href="../myBlog/view"><i
                                            class="fa-brands fa-microblog"></i> Мой блог</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../photos/index"><i class="far fa-images"></i>
                                    Фотоальбом</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../contacts/index"><i
                                            class="far fa-address-book"></i> Контакты</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../test/index"><i class="far fa-file-alt"></i>
                                    Тест</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../guestBook/index"><i
                                            class="fa-solid fa-book-open-cover"></i> Гостевая книга</a>
                            </li>
                            <li id="dropMenuInterests" class="nav-item">
                                <a class="nav-link nav-color px-0" href="../myInterests/index"><i
                                            class="fas fa-table-tennis"></i> Мои интересы</a>
                                <ul id="myDropdown" class="bg-white p-1">
                                    <li class="nav-item">
                                        <a href="../myInterests/index#mySerial" class="btn btn-outline-primary mb-2"
                                           style="font-size: 14px !important;">1. Мои любимые сериалы</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../myInterests/index#myHobby" class="btn btn-outline-primary mb-2"
                                           style="font-size: 14px !important;">2. Мои хобби</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../myInterests/index#myBooks" class="btn btn-outline-primary mb-2"
                                           style="font-size: 14px !important;">3. Мои любимые книги</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../myInterests/index#myGames" class="btn btn-outline-primary"
                                           style="font-size: 14px !important;">4. Мои любимые игры</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo '<div class="d-flex align-items-center gap-3 authorization-nav">';
                        echo '<span class="nav-font">' . $_SESSION["user"]["name"] . '</span>';
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
                <h1 class="card-title d-flex text-about-header justify-content-center mt-0 mb-3">Мой блог</h1>
                <div class="d-flex gap-4 flex-column text-guestBook pb-3">
                    <?php
                    $records = $vars->getRecords(5);
                    foreach ($records as $value):
                    echo '<form method="post" enctype="application/x-www-form-urlencoded" action="../myBlog/saveComment" class="form text-about js-form-validate" id="commentForm' . $value->id . '">';
                    echo '<div>';
                    echo '<div class="card">';
                    echo '<div class="card-header bg-success text-white d-flex justify-content-between" style="opacity: 80%">';
                    echo '<div>' . $value->title . '</div>';
                    echo '<div>' . $value->createdAt . '</div>';
                    echo '</div>';
                    echo '<div class="card-body">';
                    if (trim($value->imageUrl)) {
                        echo '<img src="' . $value->imageUrl . '" class="image-blog my-3 mx-auto d-block" alt="Картинки не существует">';
                    }
                    echo '<p class="card-text">' . $value->content . '</p>';
                    echo '</div>';
                    echo '<div class="d-flex justify-content-end py-3 px-3">
                    <a id="modal' . $value->id . '" type="button" data-bs-toggle="modal" data-bs-target="#commentModal' . $value->id . '" class="text-decoration-none text-dark text-guestBook">Добавить комментарий</a>
                </div>'; ?>
                </div>
                <div id="commentariesNotation<?php echo $value->id; ?>" style="display: none !important;" class="d-flex pt-3 pb-2 text-guestBook">
                    Комментарии:
                </div>

                <?php $comments = $vars2->getCommentsByPublication($value->id);
                    if ($comments != null && count($comments) > 0)
                    {
                        echo '<div id="commentariesNotationFake' . $value->id . '" class="d-flex pt-3 pb-2 text-guestBook">
                                Комментарии:
                              </div>';
                    }
                    foreach ($comments as $comment):?>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between ">
                            <div>Автор: <?php echo $comment->userName; ?></div>
                            <div>Дата написания: <?php echo $comment->createdAt; ?></div>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $comment->content; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="modal fade" id="commentModal<?php echo $value->id; ?>" tabindex="-1"
                     aria-labelledby="commentModal<?php echo $value->id; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="hidden" name="publicationId" value="<?php echo $value->id; ?>">
                                    <label for="message-text" class="text-guestBook col-form-label">Напишите
                                        комментарий:</label>
                                    <textarea rows="7" name="content" class="form-control" id="message-text<?php echo $value->id; ?>"
                                              placeholder="Начните вводить..."></textarea>
                                </div>
                            </div>
                            <div class="d-flex gap-3 pb-4 px-3 justify-content-center align-items-center">
                                <input id="formSubmit" type="submit" value="Отправить"
                                       class="button button_submit button-wide">
                                <button type="button" class="button_submit inter-button-text button-wide"
                                        data-bs-dismiss="modal">Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <script>
                    $("#commentForm<?php echo $value->id; ?>").submit(function (event) {
                        event.preventDefault();
                        var http = new XMLHttpRequest();
                        var url = '../myBlog/saveComment';
                        http.open('POST', url, true);
                        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                        http.onreadystatechange = function () {//Call a function when the state changes.
                            if (http.readyState === 4 && http.status === 200) {
                                if (http.responseText && http.responseText.replace(/\s/g, '').length !== 0)
                                {
                                    var result = JSON.parse(http.responseText);
                                    if (result['successful'])
                                    {
                                        var commentariesFake = document.getElementById("commentariesNotationFake<?php echo $value->id; ?>");
                                        if (commentariesFake == null)
                                        {
                                            var commentaries = document.getElementById("commentariesNotation<?php echo $value->id; ?>");
                                            commentaries.style.display = "block";
                                            $('#commentariesNotation<?php echo $value->id; ?>').after(result['commentData']);
                                        } else
                                        {
                                            $('#commentariesNotationFake<?php echo $value->id; ?>').after(result['commentData']);
                                        }
                                        var message = document.getElementById("message-text<?php echo $value->id; ?>");
                                        message.value = "";
                                        $('#commentModal<?php echo $value->id; ?>').modal('hide');
                                    }
                                }
                            }
                        }
                        http.send($('#commentForm<?php echo $value->id; ?>').serialize());
                    });
                </script>
                <?php endforeach; ?>
            </div>
            <nav aria-label="Page navigation" class="d-flex justify-content-center pt-3">
                <ul class="pagination">
                    <li class="page-item <?php if ($vars->numberPage - 1 < 0) echo 'disabled'; ?>">
                        <?php if ($vars->numberPage - 1 < 0) {
                            echo '<a class="page-link" tabindex="-1" aria-disabled="true">Предыдущий</a>';
                        } else {
                            echo '<a class="page-link" type="button" onclick="location=\'../myBlog/view?number=' . ($vars->numberPage - 1) . '\'">Предыдущий</a>';
                        } ?>
                    </li>
                    <?php
                    for ($i = 0; $i <= $vars->countPages; $i++) {
                        if ($i == $vars->numberPage) {
                            echo '<li class="page-item  active" aria-current="page">';
                        } else {
                            echo '<li class="page-item" aria-current="page">';
                        }
                        echo '<a class="page-link" type="button" onclick="location=\'../myBlog/view?number=' . $i . '\'">' . ($i + 1) . '</a>';
                    } ?>
                    <li class="page-item <?php if ($vars->numberPage + 1 > $vars->countPages) echo 'disabled'; ?>">
                        <?php if ($vars->numberPage + 1 > $vars->countPages) {
                            echo '<a class="page-link" tabindex="-1" aria-disabled="true">Следующий</a>';

                        } else {
                            echo '<a class="page-link" type="button" onclick="location=\'../myBlog/view?number=' . ($vars->numberPage + 1) . '\'">Следующий</a>';
                        } ?>
                    </li>
                </ul>
            </nav>
            </form>
        </div>
    </div>
</div>
</div>