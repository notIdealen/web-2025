<div class="content-container">
    <div class="contentmaker-container">
        <div class="ava-container">
            <img class="ava" src=<?= $ava ?> alt="">
        </div>
        <span class="nickname"><?= "{$name} {$last_name}" ?></span>
        <img class="edit-icon" src="./static/v2/images/icons/edit_icon.png" alt="">
    </div>
    <div class="fotocontent-container">
        <img class="foto-post" src=<?= $image ?> alt=""  width="400px">
    </div>
    <div class="reaction-container">
        <span class="heart">❤️</span>
        <span class="text like-value"><?= $like ?></span>
    </div>
    <p class="text"><?= $text ?></p>
    <p class="date-text"><?= $date ?></p>
</div>