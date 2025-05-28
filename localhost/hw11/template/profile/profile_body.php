<div class="profile__header-container">
    <div class="profile__avatar-container">
        <img class="profile__avatar" src=<?= $user['image_path'] ?? './image/icon/empty_ava.jpg'; ?> alt=""> 
    </div>
    <p class="profile__nickname"><?= "$user[name] $user[lastname]" ?></p>
    <p class="profile__about"><?= $user['quote'] ?></p>
    <div class="profile__post-counter-container">
        <a href="home?user_id=<?= $user['id']; ?>">
            <img class="profile__icon-post-counter" src="./image/icon/posts_icon.png" alt="">
            <span class="profile__total-posts"><?= ($totalPosts > 1) ? "$totalPosts posts" : "$totalPosts post"; ?></span>
        </a>
    </div>
</div>
<a href="create?user_id=<?= $user['id'] ?>">---------------------Create_post</a>
<div class="profile__content-container">
    <?php 
    foreach ($posts as $post) { ?>
        <div class="profile__image-container">
            <img class="profile__image" src=<?= $post['image_path'] ?> alt="">
        </div>
    <?php } 
    ?>
</div>