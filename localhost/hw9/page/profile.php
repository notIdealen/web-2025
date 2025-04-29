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
    require_once __DIR__ . '/../template/head/head.php';
    require_once __DIR__ . '/../template/head/head-profile/head-profile.php';
?>
<body>
    <div class="main-container">
        <?php 
            require_once __DIR__ . '/../template/menu.php';
            require_once __DIR__ . '/../template/header.php'; 
        ?>
        <a href="create?user_id=<?= $user['id'] ?>">Create_post</a>
        <div class="viewport-container">
            <?php
                require_once __DIR__ . "/../template/user_profile.php";    
            ?>
        </div>
    </div>
</body>
</html>