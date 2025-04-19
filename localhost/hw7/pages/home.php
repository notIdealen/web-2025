<?php
    $title = "This house is not your HOME";
    $commonCss = "./css/home.css";
    $menuCss = "./css/menu.css";
    $headerCss = "./css/header.css";

    require_once __DIR__ . '/../templates/head.php';
    
?>
<body>
    <div class="main-container">
    <?php 
        require_once __DIR__ . '/../templates/menu.php';
        require_once __DIR__ . '/../templates/header.php'; 
     ?>
        <div class="viewport-container">
            <div class="content-feed">
                <?php
                    $users = getDataFromJSON('users');
                    $posts = getDataFromJSON('posts');

                    foreach ($posts as $post) {
                        $image = $post['image'];
                        $text = $post['text'];
                        $like = $post['like'];
                        $user_id = $post['user_id'];
                        $date = $post['post_id'];
                        
                        $user = (string)$user_id;

                        $name = $users[$user]['name'];
                        $last_name = $users[$user]['last_name'];
                        $ava = $users[$user]['ava'];

                        require "./templates/posts_feed.php"; 
                    } 
                ?>
            </div>
        </div>
    </div>
</body>
</html>