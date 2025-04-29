<div class="container">
    <div class="ava-container">
        <img class="ava-image" src=<?= $user['image_path'] ?? './image/icon/empty_ava.jpg'; ?> alt=""> 
    </div>
    <p class="nickname"><?= "$user[name] $user[lastname]" ?></p>
    <p class="about"><?= $user['quote'] ?></p>
    <a href="home?user_id=<?= $user['id']; ?>">
        <div class="posts-value-container">
            <img class="posts-icon" src="./image/icon/posts_icon.png" alt="">
            <span class="posts-value-text"><?= ($totalPosts > 1) ? "$totalPosts posts" : "$totalPosts post"; ?></span>
        </div>
    </a>
</div>

<div class="images-container">
    <?php 
    foreach ($posts as $post) { ?>
        <div class="image-container">
            <img class="image" src=<?= $post['image_path'] ?> alt="">
        </div>
    <?php } 
    ?>
</div>