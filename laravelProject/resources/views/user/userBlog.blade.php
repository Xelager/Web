@extends('template')

@section('title')
    Блог
@endsection

@section('main-content')<div class="d-flex flex-column mx-5 border-common justify-content-center">
    <div class="some-form">
        <div class="form text-about js-form-validate">
            <h1 class="card-title d-flex text-about-header justify-content-center mt-0 mb-3">Мой блог</h1>
            <?php use App\Models\Comment;?>
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
@endsection
