@extends('template')

@section('title')
    Блог
@endsection

@section('main-content')
    <div class="d-flex flex-column mx-5 border-common justify-content-center">
        <div class="some-form">
            <div class="form text-about js-form-validate">
                <h1 class="card-title d-flex text-about-header justify-content-center mt-0 mb-3">Мой блог</h1>
                <?php use App\Models\Comment;?>
                <form enctype="multipart/form-data" method="post" action="{{url('admin/blog/loadBlogCSV')}}">
                    @csrf
                    <div class="d-flex gap-2 flex-column mb-3">
                        <div class="input-group" style="width: 50%">
                            <input type="file" class="form-control" name="csvFile" id="csvFile">
                            <input id="submitFile" type="submit" class="input-group-text" value="Загрузить статьи">
                        </div>
                    </div>
                </form>
                <a class="btn btn-primary mb-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                    Редактор блога
                </a>
                <div class="collapse mb-4" id="collapseExample">
                    <div class="card card-body">
                        <form enctype="multipart/form-data" action="{{url('admin/blog')}}" method="post">
                            @csrf
                            <div class="some-form__line">
                                <input id="title" title="Пример: title" type="text" name="title" placeholder="Title *" value="" data-validate>
                                <span class="some-form__hint-succesfull">Отлично</span>
                                <span class="some-form__hint"></span>
                            </div>
                            <div class="some-form__line ">
                                <textarea id="content" title="Пример: Да он крут!"  name="content" placeholder="Текст статьи *" data-validate rows="20"></textarea>
                                <span class="some-form__hint-succesfull">Отлично</span>
                                <span class="some-form__hint"></span>
                            </div>
                            <div class="some-form__line">
                                <input type="file" class="form-control" name="imageFile" id="imageFile">
                                <span class="some-form__hint-succesfull">Отлично</span>
                            </div>
                            <div class="d-flex gap-3 some-form__submit align-items-center pt-3">
                                <input id="submitBlog" type="submit" value="Добавить запись" class="button button_submit button-wide">
                                <button type="reset" value="reset" class="button_submit inter-button-text button-wide">Очистить поля</button>
                            </div>
                        </form>
                    </div>
                </div>
                @if (is_array($errors) && count($errors) > 0)
                    <div class="alert alert-danger d-flex flex-column align-items-center" role="alert">
                        @foreach ($errors as $error)
                            <div class="d-flex align-items-center gap-2">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>{{ $error }}</div>
                            </div>
                        @endforeach
                    </div>
                @elseif ($errors->any())
                    <div class="alert alert-danger d-flex flex-column align-items-center" role="alert">
                        @foreach ($errors->all() as $error)
                            <div class="d-flex align-items-center gap-2">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>{{ $error }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="d-flex gap-4 flex-column text-guestBook pb-3">
                    <?php
                    foreach ($publications as $value):
                    echo '<form method="post" enctype="multipart/form-data" action="../admin/blog/update" name="update" class="form text-about js-form-validate" id="editPublicationForm' . $value->id . '">';
                    echo '<div>';
                    echo '<div class="card">';
                    echo '<div class="card-header bg-success text-white d-flex justify-content-between" style="opacity: 80%">';
                    echo '<div id="title'.$value->id .'">' . $value->title . '</div>';
                    echo '<div>' . $value->createdAt . '</div>';
                    echo '</div>';
                    echo '<div class="card-body">';
                    if (trim($value->imageUrl)) {
                        echo '<img src="'.$value->imageUrl.'" class="image-blog my-3 mx-auto d-block" alt="Картинки не существует">';
                    }
                    echo '<p id="content'.$value->id .'" class="card-text">' . $value->content . '</p>';
                    echo '</div>';?>
                    <div class="d-flex justify-content-end gap-3 py-3 px-3">
                        <a id="modal<?php echo $value->id; ?>" type="button" data-bs-toggle="modal" data-bs-target="#editPublicationModal<?php echo $value->id; ?>" class="myBlog-link text-decoration-none text-dark text-guestBook">Изменить публикацию</a>
                        <a id="deleteForm<?php echo $value->id; ?>" href="../admin/blog/delete/<?php echo $value->id; ?>" class="myBlog-link text-decoration-none text-dark text-guestBook">Удалить</a>
                    </div>
                </div>
                <?php $comments = Comment::all()->where('publicationId', $value->id)->sortBy('createdAt', true);
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
                                <input id="inputTitle<?php echo $value->id; ?>" title="Пример: title" type="text" name="title" placeholder="Title *" value="<?php echo $value->title ?>" data-validate>
                                <span class="some-form__hint-succesfull">Отлично</span>
                                <span class="some-form__hint"></span>
                            </div>
                            <div class="some-form__line ">
                                <textarea id="inputContent<?php echo $value->id; ?>" title="Пример: Да он крут!"  name="content" placeholder="Текст статьи *" data-validate rows="20"><?php echo $value->content ?></textarea>
                                <span class="some-form__hint-succesfull">Отлично</span>
                                <span class="some-form__hint"></span>
                            </div>
                        </div>
                        <div class="d-flex gap-3 pb-4 px-3 justify-content-center align-items-center">
                            @csrf
                            <input id="formSubmit<?php echo $value->id; ?>" formaction="../admin/blog/update" type="submit" name="update" value="Изменить"
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
                        var titleInput = document.querySelector("#inputTitle<?php echo $value->id; ?>")
                        var contentInput = document.querySelector("#inputContent<?php echo $value->id; ?>")
                        // использование метода fetch() для отправки асинхронного запроса на сервер
                        let response = await fetch(`../admin/blog/update`, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json, text/plain, */*',
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                            },
                            body: JSON.stringify({
                                id: "<?php echo $value->id; ?>",
                                title: titleInput.value,
                                content: contentInput.value,
                                imageUrl: "<?php echo $value->imageUrl; ?>",
                                createdAt: "<?php echo $value->createdAt; ?>"
                            })
                        });

                        if (response.ok) {
                            // получаем ответ в формате JSON и сохраняем его в decode data
                            let jsonData = await response.json();
                            if (jsonData['data']) {
                                $('#title<?php echo $value->id; ?>').text(jsonData["data"]["title"]);
                                $('#content<?php echo $value->id; ?>').text(jsonData["data"]["content"]);
                                $('#editPublicationModal<?php echo $value->id; ?>').modal('hide');
                            }
                        }
                    } catch (error) {
                        console.log(error);
                    }
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
@endsection
