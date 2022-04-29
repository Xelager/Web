<form enctype="multipart/form-data" method="post" action="../guestBook/uploadBook">
    <div class="d-flex gap-2 flex-column">
        <div class="input-group" style="width: 50%">
            <input type="file" class="form-control" name="feedbackFile" id="feedbackFile">
            <input type="submit" class="input-group-text" value="Загрузить отзывы">
        </div>
        <span class="input-group text-guestBook mb-3" style="font-size: 14px"><?php if (!empty($_COOKIE["Data"])) {
                echo $_COOKIE["Data"];
            } ?></span>
    </div>
</form>