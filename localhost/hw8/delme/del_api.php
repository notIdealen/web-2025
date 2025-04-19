<?php
const MAX_LENGTH_CONTENT = 500;
// require_once 'script/database.php';

$method = $_SERVER['REQUEST_METHOD'];
echo $method;
// echo empty($_FILES) ? "EMPTY" : "FILL something";

if ($_FILES && $_FILES["img"]["error"]== UPLOAD_ERR_OK)
{
    $name = "upload/" . $_FILES["img"]["name"];
    // move_uploaded_file($_FILES["img"]["tmp_name"], $name);
    echo "$name Файл загружен";
} else {
    echo "ERROR";
}

var_dump($_FILES['img']);
/*
try {
    $con = connectDB();
    if ($method === 'POST') {
        $content = $_POST['content'];

        if (strlen($content) > MAX_LENGTH_CONTENT) {
            // htmlspecialchars()
            $content = substr($content, 0, MAX_LENGTH_CONTENT);
        }

        
    }
} catch (PDOException $e) {
	echo $e->getMessage();
}
*/


//парсинг json + картинка
// 1.Обработать новые параметры, если данные некорректные -сообщить пользователю
// 2.Картинку сохранить в папку images
// 3.Сформировать запрос к БД
// 4.Выполнить SQL запрос
// Отправлять POST-запросы через postman
// b.Сформировать руками JSON (потом JSON будет формироваться на клиенте через JavaScript){'title': 'Post number 13’,.......}
// p.s. картинку принимаем на backend файлом
// c.Проверить на странице home появился ли у вас новый пост

function saveToDB(){}
// $con = null;
?>