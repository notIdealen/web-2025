<?php
    require_once __DIR__ . '/../template/head.php';
    require_once "./template/create_post/cp_head.php";
?>

<body>
    <div class="main-container">
        <?php 
            require_once __DIR__ . '/../template/menu.php';  
        ?>
        <div class="viewport-container">
            <div class="content-feed">
                <?php
                    require_once "./template/create_post/cp_body.php"; 
                ?> 
            </div>
        </div>
    </div>
</body>
</html>
