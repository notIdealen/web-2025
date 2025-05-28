<?php   
    require_once __DIR__ . '/../script/database.php';
    $user_id = filter_var($_GET['user_id'], FILTER_VALIDATE_INT, ['option' => ['min_range' => 1]]) ?? null;
    if ($user_id !== null) {
        try {
            $con = connectDB();
            if ($con) {
                $user = getUserFromDB($con, $user_id);
                $posts = getPostsFormDB($con, $user['id']);
                $totalPosts = count($posts);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }  
    } else {
        echo '<script> document.location.href="home" </script>';
    }
    require_once __DIR__ . '/../template/head.php';
    require_once __DIR__ . '/../template/profile/profile_head.php';
?>
<body>
    <div class="main-container">
        <?php 
            require_once __DIR__ . '/../template/header.php'; 
            require_once __DIR__ . '/../template/menu.php';
        ?>
        <div class="viewport-container">
            <?php
                require_once __DIR__ . "/../template/profile/profile_body.php";    
                ?>
        </div>
    </div>
</body>
</html>