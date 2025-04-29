<?php
    require_once __DIR__ . '/../template/head/head.php';
    require_once __DIR__ . '/../template/head/head-home/head-home.php';
    require_once __DIR__ . '/../script/database.php';
?>
<body>
    <div class="main-container">
        <?php 
            require_once __DIR__ . '/../template/menu.php';
            require_once __DIR__ . '/../template/header.php'; 
            ?>
        <div class="viewport-container">
            <div class="content-feed">
                <?php
                    require_once __DIR__ . '/../script/show_post_date.php';
                    
                    try {
                        $con = connectDB();
                        $posts = getPostsFormDB($con, $_GET['user_id'] ?? 0, DB_LIMIT_ROWS);
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
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>