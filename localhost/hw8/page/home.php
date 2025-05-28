<?php
    require_once __DIR__ . '/../template/head/head.php';
    require_once __DIR__ . '/../template/head/head-home/head-home.php';
    require_once __DIR__ . '/../script/database.php';
           
    try {
        $con = connectDB();
        $posts = getPostsFormDB($con, $_GET['user_id'] ?? 0, DB_LIMIT_ROWS);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

?>
<body>
    <div class="main-container">
        <?php 
            require_once __DIR__ . '/../template/header.php'; 
            require_once __DIR__ . '/../template/menu.php';
            ?>
        <div class="viewport-container">
            <div class="content-feed">
                <?php
                    require_once __DIR__ . '/../script/show_post_date.php';
                    if (!$posts) {
                        echo 'Данные не получены';
                    } else {
                        foreach ($posts as $post) {
                            $date = $post['created_at'];
                            $date = showPostDate($date);
                            $user = getUserFromDB($con, (string)$post['created_by']);
            
                            require __DIR__ . "/../template/posts_feed.php"; //если поставить once, то выведет только один пост
                        } 
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>