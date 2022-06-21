<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dropDownMenuInterests.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/validInput.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Gemunu+Libre:wght@700&family=Inter:wght@500;600;700&family=Open+Sans:ital,wght@1,500;1,600&display=swap" rel="stylesheet">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/jquery.inputmask.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<div class="d-flex flex-column mx-5 border-common justify-content-center">
    <div class="some-form">
        <div class="form text-about js-form-validate">
            <h1 class="card-title d-flex text-about-header justify-content-center mt-0 mb-3">Мой блог</h1>
            <?php use App\Models\Comment;?>
            <div class="d-flex justify-content-center mt-4">
                {{$publications->links('pagination::bootstrap-4') }}
            </div>
            <div class="d-flex gap-4 flex-column text-guestBook pb-3">
                <?php
                foreach ($publications as $value):
                echo '<form method="post" enctype="multipart/form-data" action="../user/blog/addComment" class="form text-about js-form-validate" id="commentForm' . $value->id . '">';
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
                    <a id="modal' . $value->id . '" type="button" data-bs-toggle="modal" data-bs-target="#commentModal' . $value->id . '" class="myBlog-link text-decoration-none text-dark text-guestBook">Добавить комментарий</a>
                </div>'; ?>
            </div>
            <div id="commentariesNotation<?php echo $value->id; ?>" style="display: none !important;" class="d-flex pt-3 pb-2 text-guestBook">
                Комментарии:
            </div>

            <?php $comments = Comment::all()->where('publicationId', $value->id)->sortBy('createdAt', true);
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
                        @csrf
                        <input id="formSubmit" type="submit" value="Отправить"
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
            $("#commentForm<?php echo $value->id; ?>").submit(function (event) {
                event.preventDefault();
                var http = new XMLHttpRequest();
                var url = '../user/blog/addComment';
                http.open('POST', url, true);
                http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                http.setRequestHeader('X-CSRF-TOKEN', $('input[name="_token"]').val());
                http.onreadystatechange = function () {//Call a function when the state changes.
                    if (http.readyState === 4 && http.status === 200) {
                        if (http.responseText && http.responseText.replace(/\s/g, '').length !== 0)
                        {
                            var result = JSON.parse(http.responseText);
                            if (result)
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
    <div class="d-flex justify-content-center my-3">
        {{$publications->links('pagination::bootstrap-4') }}
    </div>
</div>
</div>
</div>
</div>
