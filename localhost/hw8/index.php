<?php
    require_once 'config/path.php';
    $page = $_GET['pg'] ?? '';
    // var_dump($PAGEPATH);
    switch ($page) {
        case ''        : require_once "$PAGEPATH/login.php"; break;
        case 'home'    : require_once "$PAGEPATH/home.php"; break;
        case 'profile' : require_once "$PAGEPATH/profile.php"; break;
        case 'create'  : require_once "$PAGEPATH/create_post.php"; break;
        default        : require_once "$PAGEPATH/404.php";
    }
?>

