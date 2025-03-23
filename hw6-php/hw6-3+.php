<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Home work #6.1</title>
</head>
<body>
  <form>
    <input type="text" name="date">
    <input type="submit">
  </form>

<?php
$toLCase = [
    'ru' => ['А' => 'а', 'В' => 'в', 'Г' => 'г', 'Д' => 'д', 'Е' => 'е', 'И' => 'и', 'Й' => 'й', 'К' => 'к', 'Л' => 'л', 'М' => 'м', 'Н' => 'н', 'О' => 'о', 'П' => 'п', 'Р' => 'р', 'С' => 'с', 'Т' => 'т', 'У' => 'у', 'Ф' => 'ф', 'Ю' => 'ю', 'Я' => 'я', ], 
    'en' => ['A' => 'a', 'B' => 'b', 'C' => 'c', 'D' => 'd', 'E' => 'e', 'F' => 'f', 'G' => 'g', 'H' => 'h', 'I' => 'i', 'J' => 'j', 'K' => 'k', 'M' => 'm', 'N' => 'n', 'O' => 'o', 'P' => 'p', 'Q' => 'q', 'R' => 'r', 'S' => 's', 'T' => 't', 'U' => 'u', 'V' => 'v', 'W' => 'w', 'X' => 'x', 'Y' => 'y', 'Z' => 'z', ]
];

$mAr = [
    'ru' => ['янв' => 1, 'фев' => 2, 'мар' => 3, 'апр' => 4, 'май' => 5, 'июн' => 6, 'июл' => 7, 'авг' => 8, 'сен' => 9, 'окт' => 10, 'ноя' => 11, 'дек' => 12,], 
    'en' => ['jan' => 1, 'feb' => 2, 'mar' => 3, 'apr' => 4, 'may' => 5, 'jun' => 6, 'jul' => 7, 'aug' => 8, 'sep' => 9, 'okt' => 10, 'nov' => 11, 'dec' => 12,]
];

$i = 0;
$buffer = "";
$d;
$month = ""; $m;
$counter = "0";
$splitter = null;
$key = 0;
$languge = "";

$d = 17;
if (!empty($_GET['date'])) {
    // $month = $_GET['date']; 
    $date = $_GET['date']; 

    // echo $date . "<br>";
    
    if (is_int((int)$counter)) {
        echo (int)$month . ' !!!!!' . "<br>";
    }

    while (isset($date[$i])) {
        if (!(int)$date[$i] && $counter === 0 && $date[$i] != 0) { //остановился тут
            echo "splitter block " . $date[$i] . "<br>";
            $counter++;
            // $splitter = $date[$i];
            // $buffer = "";
        } else {
            echo "Buffer block " . $date[$i] . "<br>";
            // $buffer = $buffer . $date[$i];
            // if ($i < 3) {
            //     $d = (int)$buffer;
            // }
        }
        
        // if ($counter === 1 && $splitter != $date[$i]) {
        //     $month = $month . $date[$i];
        // } else {
        //     $counter++;
        // }
        
        $i++;
    }
    // echo $month;


/*// ниже всё сделано
    if ((int)$month > 0 && (int)$month <= 12) {
        echo $month . ' month write digits';
        $m = (int)$month; 
    } else {
        foreach ($toLCase as $lang => $letters) {
            if (isset($m)) {
                break;
            }
            foreach($letters as $h => $l) {
                $languge = $lang;
                if ($lang = 'ru') {
                    if (($month[0] . $month[1]) == $h || ($month[0] . $month[1]) == $l) { 
                        $m = $l;
                        break;
                    }
                } else {
                    if ($month[0] == $h || $month[0] == $l) { 
                        $m = $l;
                        break;
                    }
                }
            }
        }
        if ($languge = 'ru') {
            $m = isset($toLCase[$languge][$month[2] . $month[3]]) ? $m . $toLCase[$languge][$month[2] . $month[3]] : $m . $month[2] . $month[3];
            $m = isset($toLCase[$languge][$month[4] . $month[5]]) ? $m . $toLCase[$languge][$month[4] . $month[5]] : $m . $month[4] . $month[5];
            $m = $mAr[$languge][$m];
        } else {
            $m = isset($toLCase[$languge][$month[1]]) ? $m . $toLCase[$languge][$month[1]] : $m . $month[1];
            $m = isset($toLCase[$languge][$month[2]]) ? $m . $toLCase[$languge][$month[2]] : $m . $month[2];
            $m = $mAr[$languge][$m];
        }
            echo $m . " month number";
    }   
    $key = $m * 100 + $d;
    echo "<br>";
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
*/
}
?>

</body>
</html>