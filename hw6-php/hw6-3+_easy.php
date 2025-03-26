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
    <input type="text" name="date" accept-charset="utf-8">
    <input type="submit">
  </form>
  <p> В случае неопределенности первое число считается днём, второе месяцем оставшееся это год.</p>

<?php
function printArray($arr) {
    echo "Введенные данные ";
    foreach ($arr as $k => $v) {
        echo $v . ' ';
    }
    echo "<br>";
}

$buf = "";
$counter = 0;
$day = null;
$month = null;
$year = null;
$flag = null;
$key = 0;
$da = [];
$mAr = [
    'ru' => ['error', 'янв', 'фев', 'мар', 'апр', 'май', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноя', 'дек',], 
    'en' => ['error', 'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'dec',]
];
$languge = null;

if (!empty($_GET['date'])) { 
    $date = $_GET['date']; 
    $date = mb_strtolower($date) . " ";

    for ($i = 0; $i < strlen($date); $i++) {
        if ((ord($date[$i]) >=  48 && ord($date[$i]) <=  57) ||
            (ord($date[$i]) >=  97 && ord($date[$i]) <= 122) ||
            (ord($date[$i]) >= 127 && ord($date[$i]) <= 239)) {
                if (!$languge && ord($date[$i]) >= 127) {
                    $languge = 'ru';
                }
                $buf = $buf . $date[$i];
            } elseif ($buf != "") {
                array_push($da, $buf);
                $buf = "";
            }
    }
    printArray($da);

    foreach ($da as $k => $v) {
        if ((int)$v <= 12) {
            $counter++;
        }
        if ($counter === 1) {
            $flag = $k - 1;
        } else {
            $flag = -1;
        }
        if ((int)$v == 0) {
            $month = $v;
            unset($da[$k]);
        }
        if ((int)$v > 31) {
            $year = $v;
            unset($da[$k]);
        }
    }

    if ($year) {
        if ($month) {
            $day = (int)implode('', $da);
        } else {
            foreach ($da as $k => $v) {
                if ((int)$v > 12) {
                    $day = (int)$v;
                    unset($da[$k]);
                }
            }
            if ($day) {
                $month = (int)implode('', $da);
            } else {
                $month = array_pop($da);
                $day = array_pop($da);
            }
        }
    } else {
        if ($month) {
            $year = array_pop($da);
            $day = array_pop($da);
        } else {
            if ($flag >= 0) {
                $month = $da[$flag];
                unset($da[$flag]);
                $year = array_pop($da);
                $day = array_pop($da); 
            } else {
                $year = array_pop($da);
                $month = array_pop($da);
                $day = array_pop($da); 
            }
        }
    }

    if (!(int)$month) {
        if ($languge == 'ru') {
            $month = substr($month, 0, 6);
        } else {
            $month = substr($month, 0, 3); 
        }
        foreach ($mAr as $lang => $v) {
            foreach ($v as $k => $m) {
                if ($m == $month) {
                    $month = $k;
                }
            }
        } 
        if ((int)$month === 0) {
            $month = -1;
        }  
    }
    echo "День = " . $day . "; Месяц = " . $month . "; Год = " . $year . "<br>";
    
    if ($month > 12 || $month < 0 || $day > 31 || $day <= 0 || $year < 1) {
        echo "Неверно введены данные.";
        $key = -1;
    } else {
        $key = $month * 100 + $day;
    }
    echo "<br>";
    switch($key) {
        case $key < 0                    : echo  "Неизвестный"; break;
        case $key <= 120 || 1222 <= $key : echo      "Козерог"; break;
        case $key <= 219                 : echo      "Водолей"; break;
        case $key <= 320                 : echo         "Рыбы"; break;
        case $key <= 420                 : echo         "Овен"; break;
        case $key <= 520                 : echo        "Телец"; break;
        case $key <= 621                 : echo     "Близнецы"; break;
        case $key <= 722                 : echo          "Рак"; break;
        case $key <= 823                 : echo          "Лев"; break;
        case $key <= 923                 : echo         "Дева"; break;
        case $key <= 1023                : echo         "Весы"; break;
        case $key <= 1122                : echo     "Скорпион"; break;
        default                          : echo      "Стрелец";
    }
}
?>

</body>
</html>