<?php
const MAX_LENGTH_CONTENT = 500;
require_once 'script/database.php';
require_once 'script/give_image_name.php';

$method = $_SERVER['REQUEST_METHOD'];

// echo $_FILES["img"]["name"] . "<br>";
// echo $_FILES["img"]["type"] . "<br>";
// echo $_FILES["img"]["size"] . "<br>";
// echo $_FILES["img"]["tmp_name"] . "<br>";
// echo $_FILES["img"]["error"] . "<br>";
// echo $_FILES["img"]["full_path"] . "<br>";

try {
    $con = connectDB();
    if ($method === 'POST') {
        $user = getUserFromDB($con, $_POST['user_id']);
        
        if ($_FILES && $_FILES["img"]["error"] == UPLOAD_ERR_OK)
        {
            
            $imageTitle = giveImageName($user['folder_name']);
            // echo $imageTitle . "<br>";
            $imageExt = strchr($_FILES["img"]["name"], '.');
            $imagePath = 'image/user/' . $user['folder_name'] . '/' . $imageTitle . $imageExt;
            // echo $imagePath . "<br>";
            move_uploaded_file($_FILES["img"]["tmp_name"], $imagePath);
            echo "Файл загружен";
        } else {
            echo "ERROR";
        }
      
        $content = $_POST['content'];
        if (strlen($content) > MAX_LENGTH_CONTENT) {
            // htmlspecialchars()
            $content = substr($content, 0, MAX_LENGTH_CONTENT);
        }
        pushPostToDB($con, $content, $_POST['user_id'], ('./' . $imagePath));
    }
} catch (PDOException $e) {
	echo $e->getMessage();
}
?>