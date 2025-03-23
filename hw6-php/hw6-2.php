<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home work #6.1</title>
</head>
<body>
  <form action="" method="GET">
    <input type="number" name="digit" min="-1" max="10">
    <input type="submit">
  </form>

<?php
$dArr = ['Ноль', 'Один', 'Два', 'Три', 'Четыре', 'Пять', 'Шесть', 'Семь', 'Восемь', 'Девять',];
function digitToWord(int $d) : string {
    global $dArr;
    return ($d >= 0 && $d <= 9) ? $dArr[$d] : "Введена не цифра";
}
if (!empty($_GET['digit'])) {
    echo digitToWord($_GET['digit']);
}
?>

</body>
</html>