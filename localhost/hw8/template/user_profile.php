<div class="container">
    <div class="ava-container">
        <img class="ava-image" src=<?= $ava ?> alt=""> 
    </div>
    <p class="nickname"><?= "$name $last_name" ?></p>
    <p class="about"><?= $quote ?></p>
    <div class="posts-value-container">
        <img class="posts-icon" src="./static/v2/images/icons/posts_icon.png" alt="">
        <span class="posts-value-text"><?= $totalPosts ?> поста</span>
    </div>
</div>

<div class="images-container">
    <?php 
    foreach ($images as $image) { ?>
        <div class="image-container">
            <img class="image" src=<?= $image; ?> alt="">
        </div>
    <?php } 
    ?>
</div>