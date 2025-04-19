<?php
    $title = "This house is not your HOME";
    $commonCss = "./css/home.css";
    $menuCss = "./css/menu.css";
    $headerCss = "./css/header.css";

    require_once __DIR__ . '/../template/head.php';
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
                    try {
                        $con = connectDB();
                        $posts = getPostsFormDB($con, DB_LIMIT_ROWS);
                        if (!$posts) {
                            echo 'Данные не получены';
                            } else {
                                foreach ($posts as $post) {
                                    $image = $post['image_path'];
                                    $text = $post['content'];
                                    $like = $post['like_counter'];
                                    $user_id = $post['created_by'];
                                    $date = $post['created_at'];
                                $user = getUserFromDB($con, (string)$user_id);
                                if (!$user) {
                                    echo "User not found";
                                } else {
                                    $name = $user['name'] ?: "EMPTY";
                                    $last_name = $user['lastname'] ?: "EMPTY";
                                    $ava = $user['image_path'] ?: __DIR__ . "/../image/icon/empty_ava.jpg";
                                }
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