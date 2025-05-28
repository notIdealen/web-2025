<div class="content-container">
    <form class="create-post-form" action="./api.php" enctype="multipart/form-data" method="post">
        <div class="content-container__image-container">
            <p class="content-container__image-counter" hidden>1/1</p>
            <div class="content-container__def-content">
                <img src="./image/icon/insert_image_icon.png" alt="" class="content-container__add-image-icon">
                <label class="create-post-form__select-image-label" for="select-image">              
                    <input class="create-post-form__select-image-input" id="select-image" type="file" name="img" accept="image/*" required>
                        Добавить фото
                </label>
            </div>
        </div>
        <div class="create-post-form__full-cage-container">
            <span class="create-post-form__full-cage-text" hidden>😎 Вы добавили максимум фото, круто!</span>
        </div>
        <label class="create-post-form__select-more-image-label" for="select-more-image">              
            <input class="create-post-form__select-more-image-input" id="select-more-image" type="file" name="img" accept="image/*">
                <img class="content-container__add_image-image" src="./image/icon/add_image_icon.png" alt="">
                Добавить фото
        </label>
        <textarea class="create-post-form__text-content" placeholder="Добавьте подпись(максимум 255 символов)..." maxlength="255" name="text" rows="2" required></textarea>
        <div class="create-post-form__submit-button-container">
            <input class="create-post-form__submit-button button_disabled" type="submit" value="Поделиться" disabled>
        </div>
    </form>
</div>
