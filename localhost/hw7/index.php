<?php

    require_once 'env/paths.php';
    require_once 'scripts/getDataFromJSON.php';
    
    $page = $_GET['pg'] ?? '';
    var_dump($PAGEPATH);
    switch ($page) {
        case ''        : require_once "$PAGEPATH/login.php"; break;
        case 'home'    : require_once "$PAGEPATH/home.php"; break;
        case 'profile' : require_once "$PAGEPATH/profile.php"; break;

        default         : require_once "$PAGEPATH/404.php";
    }
?>

