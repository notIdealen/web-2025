<?php   
    $title = "PROFILE";
    $commonCss = "./css/profile.css";
    $menuCss = "./css/menu.css";
    $headerCss = "./css/header.css";

    
    require_once __DIR__ . '/../template/head.php';
    ?>
<body>
    <div class="main-container">
        <?php 
        require_once __DIR__ . '/../template/menu.php';
        require_once __DIR__ . '/../template/header.php'; 
        $user = filter_var($_GET['user_id'], FILTER_VALIDATE_INT, ['option' => ['min_range' => 1]]) ?? '-1';
        ?>
        <!-- <a href="index.php?pg=create&user_id=<?= $user ?>">Create_post</a> -->
        <a href="create?user_id=<?= $user ?>">Create_post</a>
        <div class="viewport-container">
            <?php
                // if (isset($users[$user])) {
                if ($user == 1) {
                    $name       = $users[$user]['name'];
                    $last_name  = $users[$user]['last_name'];
                    $ava        = $users[$user]['ava'];
                    $quote      = $users[$user]['quote'];
                    $images     = $users[$user]['images'];
                    $posts      = $users[$user]['posts'];
                    $totalPosts = count($posts);
                    require_once __DIR__ . "/../templates/user_profile.php";
                } else {
                    echo '<script> document.location.href="home" </script>';
                }
            ?>
        </div>
    </div>
</body>
</html>