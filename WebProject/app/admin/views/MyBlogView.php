<link rel='stylesheet' href='../../public/css/validInput.css'>
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
                                <a class="nav-link btn-orange px-2" href="../myBlog/view"><i class="fa-brands fa-microblog"></i> Мой блог</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-color px-0" href="../history/index"><i class="fas fa-history"></i> История</a>
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
                <h1 class="card-title d-flex text-about-header justify-content-center mt-0 mb-3">Мой блог</h1>
                <?php include 'app/admin/views/InputCSVFileView.php'; ?>
                <a class="btn btn-primary mb-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                    Редактор блога
                </a>
                <div class="collapse mb-4" id="collapseExample">
                    <div class="card card-body">
                        <?php include 'app/admin/views/EditBlogView.php'; ?>
                    </div>
                </div>
                <div class="d-flex gap-4 flex-column text-guestBook pb-3">
                    <?php
                    $records = $vars->getRecords(5);
                    foreach ($records as $value):
                    echo '<form method="post" enctype="application/json" action="../myBlog/editPublication" class="form text-about js-form-validate" id="editPublicationForm' . $value->id . '">';
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
                    <a id="modal' . $value->id . '" type="button" data-bs-toggle="modal" data-bs-target="#editPublicationModal' . $value->id . '" class="myBlog-link text-decoration-none text-dark text-guestBook">Изменить публикацию</a>
                </div>'; ?>
                </div>
                <?php $comments = $vars2->getCommentsByPublication($value->id);
                if ($comments != null && count($comments) > 0)
                {
                    echo '<div id="commentariesNotation' . $value->id . '" class="d-flex pt-3 pb-2 text-guestBook">
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

            <div class="modal fade" id="editPublicationModal<?php echo $value->id; ?>" tabindex="-1"
                 aria-labelledby="editPublicationModal<?php echo $value->id; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="some-form__line ">
                                <input id="title" title="Пример: title" type="text" name="title" placeholder="Title *" value="<?php echo $value->title ?>" data-validate>
                                <span class="some-form__hint-succesfull">Отлично</span>
                                <span class="some-form__hint"></span>
                            </div>
                            <div class="some-form__line ">
                                <textarea id="content" title="Пример: Да он крут!"  name="content" placeholder="Текст статьи *" data-validate rows="20"><?php echo $value->content ?></textarea>
                                <span class="some-form__hint-succesfull">Отлично</span>
                                <span class="some-form__hint"></span>
                            </div>
                        </div>
                        <div class="d-flex gap-3 pb-4 px-3 justify-content-center align-items-center">
                            <input id="formSubmit" type="submit" value="Изменить"
                                   class="button button_submit button-wide">
                            <button type="button" class="button_submit inter-button-text button-wide"
                                    data-bs-dismiss="modal">Закрыть
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <script>
                $("#editPublicationForm<?php echo $value->id; ?>").submit(async function (event) {
                    event.preventDefault();
                    try {
                        // использование метода fetch() для отправки асинхронного запроса на сервер
                        let response = await fetch(`../myBlog/editPublication`, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json, text/plain, */*',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({a: 7, str: 'Some string: &=&'})
                        });
                        if (response.ok) {
                            // получаем ответ в формате JSON и сохраняем его в data
                            let data = await response.json();
                            // выполняем рендеринг полученных данных в элемент #result
                            const count = data['count'];

                        }
                    } catch (error) {
                        console.log(error);
                    }
                });
            </script>
            <?php endforeach; ?>
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