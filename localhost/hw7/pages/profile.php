<?php   
    $title = "PROFILE";
    $commonCss = "./css/profile.css";
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
            <?php
                $users = getDataFromJSON('users');
                $user = filter_var($_GET['user_id'], FILTER_VALIDATE_INT, ['option' => ['min_range' => 1]]) ?? '-1';

                if (isset($users[$user])) {
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