<div class="content-container">
    <div class="content-container__header-container">
        <div class="content-container__avatar-container">
            <img class="content-container__avatar" src=<?= $post['ava_path'] ?: "image/icon/empty_ava.jpg"; ?> alt="">
        </div>
        <span class="content-container__nickname"> 
            <a href="profile?user_id=<?= $post['created_by'] ?>">
                <?= "$post[name] $post[lastname]"; ?>
            </a> 
        </span>
        <img class="content-container__icon-edit" src="./image/icon/edit_icon.png" alt="">
    </div>
    <div class="content-container__image-container">
        <?php
            $images = explode(';', $post['images']);
            if (count($images) > 1) {
                echo "<p class='content-container__image-counter'>" . "1/" . count($images) . "</p>";
            }
        ?>
        <div class="content-container__images">
            <?php
                for ($i = 0; $i < count($images); $i++) { 
                    if ($i === 0) {
                        echo '<img class="content-container__image" src=' . $images[$i] . ' alt="">';
                    } else {
                        echo '<img class="content-container__image" src=' . $images[$i] . ' alt="" hidden >';
                    }
                }
            ?>
        </div>
    </div>
    <div class="content-container__reaction-container">
        <span class="content-container__heart">❤️</span>
        <span class="content-container__like-counter"><?= $post['like_counter']; ?></span>
    </div>
    <?php
        if (strlen($post['content']) > 147) {
            $visiblePart = substr($post['content'], 0, 142);
            $hiddenPart = substr($post['content'], 142);
            echo '<p class="content-container__text">' . $visiblePart . '<span class="content-container__text">...</span>' . 
                '<span class="content-container__text" hidden="true">' . $hiddenPart . '</span></p>';
            echo '<button class="content-container__more-button">ещё</button>';
        } else {
            echo '<p class="content-container__text">' . $post['content'] . '</p>';
        }
    ?>
    <p class="content-container__date"><?= $date; ?></p>
</div> 