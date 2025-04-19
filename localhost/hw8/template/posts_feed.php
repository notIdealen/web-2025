<!-- использовать htmlentities()  -->
<div class="content-container">
    <div class="contentmaker-container">
        <div class="ava-container">
            <img class="ava" src=<?= $ava ?> alt="">
        </div>
        <span class="nickname"> 
            <a href="index.php?pg=profile&user_id=<?= $user_id ?>">
                <?= "{$name} {$last_name}" ?>
            </a> 
        </span>
        <img class="edit-icon" src="./image/icon/edit_icon.png" alt="">
    </div>
    <div class="fotocontent-container">
        <img class="foto-post" src=<?= $image ?> alt=""  width="400px">
    </div>
    <div class="reaction-container">
        <span class="heart">❤️</span>
        <span class="text like-value"><?= $like ?></span>
    </div>
    <p class="text"><?= htmlentities($text); ?></p>
    <p class="date-text"><?= date('d.m.Y', strtotime($date)) ?></p>
</div>