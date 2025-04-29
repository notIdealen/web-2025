<a href="home">Home</a>
<a href="page/create_post.php?= "?user_id=" . $_POST['user_id']; ?>">Create</a>
<?php
const MAX_LENGTH_CONTENT = 500;
require_once 'script/database.php';
require_once 'script/give_image_name.php';

$method = $_SERVER['REQUEST_METHOD'];

try {
    $con = connectDB();
    if ($con) {
        if ($method === 'POST') {
            $user = getUserFromDB($con, $_POST['user_id']);
            $content =  htmlentities($_POST['content']);
            if (strlen($content) > MAX_LENGTH_CONTENT) {
                $content = substr($content, 0, MAX_LENGTH_CONTENT);
            }
            if ($_FILES && $_FILES["img"]["error"] == UPLOAD_ERR_OK)
            {
                
                $imageTitle = giveImageName($user['folder_name']);
                $imageExt = strchr($_FILES["img"]["name"], '.');
                $imagePath = 'image/user/' . $user['folder_name'] . '/' . $imageTitle . $imageExt;
                move_uploaded_file($_FILES["img"]["tmp_name"], $imagePath);
                pushPostToDB($con, $content, $_POST['user_id'], ('./' . $imagePath));
                echo "Файл загружен";
            } else {
                echo "ERROR, не загружено изображение";
            }
        }
    }   
} catch (PDOException $e) {
	echo $e->getMessage();
}
?>