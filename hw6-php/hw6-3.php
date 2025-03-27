<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home work #6.1</title>
</head>
<body>
  <form action="" method="GET">
    <input type="text" name="date">
    <input type="submit">
  </form>

<?php
$numAr = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
$i = 0;
$day = "";
$month = "";
$dot = 0;
$key = 0;
if (!$_GET['date']) {
    $date = $_GET['date'];
    while (isset($date[$i])) {
        if ($date[$i] === '.') {
            $dot++;
            $i++;
            continue;
        }
        if ($dot === 0) {
            if ($i === 0 && $date[$i] == '0') {
                $i++;
                continue;
            }
            $day = $day . $date[$i];
        } elseif ($dot === 1 || $dot === 2) {
            if ($dot === 1 && $date[$i] == '0') {
                $dot++;
                $i++;
                continue;
            } 
            $month = $month . $date[$i];
            $dot++; 
        }
        $i++;
    } 
    $key = $numAr[$month - 1] * 100 + $numAr[$day - 1];
    switch($key) {
        case $key <= 120 || 1222 <= $key : echo  "Козерог"; break;
        case $key <= 219                 : echo  "Водолей"; break;
        case $key <= 320                 : echo     "Рыбы"; break;
        case $key <= 420                 : echo     "Овен"; break;
        case $key <= 520                 : echo    "Телец"; break;
        case $key <= 621                 : echo "Близнецы"; break;
        case $key <= 722                 : echo      "Рак"; break;
        case $key <= 823                 : echo      "Лев"; break;
        case $key <= 923                 : echo     "Дева"; break;
        case $key <= 1023                : echo     "Весы"; break;
        case $key <= 1122                : echo "Скорпион"; break;
        default                          : echo  "Стрелец";
    }
}
?>

</body>
</html>