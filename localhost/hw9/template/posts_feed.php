<!-- использовать htmlentities()  -->
<div class="content-container">
    <div class="contentmaker-container">
        <div class="ava-container">
            <img class="ava" src=<?= $user['image_path'] ?: "image/icon/empty_ava.jpg"; ?> alt="">
        </div>
        <span class="nickname"> 
            <a href="profile?user_id=<?= $post['created_by'] ?>">
                <?= "$user[name] $user[lastname]"; ?>
            </a> 
        </span>
        <img class="edit-icon" src="./image/icon/edit_icon.png" alt="">
    </div>
    <div class="fotocontent-container">
        <img class="foto-post" src=<?= $post['image_path'] ?> alt=""  width="400px">
    </div>
    <div class="reaction-container">
        <span class="heart">❤️</span>
        <span class="text like-value"><?= $post['like_counter']; ?></span>
    </div>
    <p class="text"><?= $post['content']; ?></p>
    <p class="date-text"><?= $date; ?></p>
</div>