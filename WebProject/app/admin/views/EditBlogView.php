<form enctype="multipart/form-data" method="post">
    <div class="some-form__line <?php echo $vars->validator->errMessages['title'] ?>">
        <input id="title" title="Пример: title" type="text" name="title" placeholder="Title *" value="<?php echo $vars->validated_fields['title'] ?>" data-validate>
        <span class="some-form__hint-succesfull">Отлично</span>
        <span class="some-form__hint"><?php echo $vars->validator->errMessages['titleError'] ?></span>
    </div>
    <div class="some-form__line <?php echo $vars->validator->errMessages['content'] ?>">
        <textarea id="content" type="text" title="Пример: Да он крут!"  name="content" placeholder="Текст статьи *" data-validate rows="20"><?php echo $vars->validated_fields['content'] ?></textarea>
        <span class="some-form__hint-succesfull">Отлично</span>
        <span class="some-form__hint"><?php echo $vars->validator->errMessages['contentError'] ?></span>
    </div>
    <div class="some-form__line <?php echo $vars->validator->errMessages['imageFile'] ?>">
        <input type="file" class="form-control" name="imageFile" id="imageFile">
        <span class="some-form__hint-succesfull">Отлично</span>
        <span class="some-form__hint"><?php echo $vars->validator->errMessages['imageFileError'] ?></span>
    </div>
    <div class="d-flex gap-3 some-form__submit align-items-center pt-3">
        <input id="formSubmit" type="submit" value="Добавить запись" class="button button_submit button-wide">
        <button type="reset" value="reset" class="button_submit inter-button-text button-wide">Очистить поля</button>
    </div>
</form>