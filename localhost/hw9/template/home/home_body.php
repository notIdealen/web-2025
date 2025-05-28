<div class="content-container">
    <div class="content-container__header-container">
        <div class="content-container__avatar-container">
            <img class="content-container__avatar" src=<?= $user['image_path'] ?: "image/icon/empty_ava.jpg"; ?> alt="">
        </div>
        <span class="content-container__nickname"> 
            <a href="profile?user_id=<?= $post['created_by'] ?>">
                <?= "$user[name] $user[lastname]"; ?>
            </a> 
        </span>
        <img class="content-container__icon-edit" src="./image/icon/edit_icon.png" alt="">
    </div>
    <div class="content-container__foto-container">
        <img class="content-container__foto" src=<?= $post['image_path'] ?> alt=""  width="400px">
    </div>
    <div class="content-container__reaction-container">
        <span class="content-container__heart">❤️</span>
        <span class="content-container__like-counter"><?= $post['like_counter']; ?></span>
    </div>
    <p class="content-container__text"><?= $post['content']; ?></p>
    <p class="content-container__date"><?= $date; ?></p>
</div> 