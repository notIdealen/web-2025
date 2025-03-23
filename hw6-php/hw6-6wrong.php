<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home work #6.1</title>
</head>
<body>
  <form action="">
    <input type="text" name="str" method="GET">
    <input type="submit">
  </form>

<?php

function result(string $str = '0') : int {
    $i = 0;
    $temp = "";
    if (!isset($str[1])) {// один символ в строке
        return (int)$str[0];

    } elseif ($str[1] == '+' || $str[1] == '-' || $str[1] == '*') {//-------------
        echo $str[0] . $str[2] . $str[1] . " Такого быть не может!<br>";

    } elseif ($str[2] == '+' || $str[2] == '-' || $str[2] == '*') {//-------------
        $op = $str[2];
        echo $str[0] . $str[2] . $str[1] . " сим-сим-знак<br>";
        if ($op == '+') {
            $r = (int)$str[0] + (int)$str[1];
        } elseif ($op == '-') {
            $r = (int)$str[0] - (int)$str[1];
        } elseif ($op == '*') {
            $r = (int)$str[0] * (int)$str[1];
        }

        if (isset($str[4]) && ($str[4] == '+' || $str[4] == '-' || $str[4] == '*')){
            $op = $str[4];
            $temp = $str[3];
            while (isset($str[$i + 5])) {
                $temp = $temp . $str[$i + 5];
            }
            if ($op == '+') {
                return $r + result($temp);
            } elseif ($op == '-') {
                return $r - result($temp);
            } elseif ($op == '*') {
                return $r * result($temp);
            }
        } elseif (isset($str[5]) && ($str[5] != '+' || $str[5] != '-' || $str[5] != '*')){
            $temp = $str[3] . $str[4] . $str[5];
            while (isset($str[$i + 6])) {
                if (!isset($str[$i + 7])) {
                    $op = $str[$i + 6];
                } else {
                    $temp = $temp . $str[$i + 6];
                }
            }
            if ($op == '+') {
                return $r + result($temp);
            } elseif ($op == '-') {
                return $r - result($temp);
            } elseif ($op == '*') {
                return $r * result($temp);
            }
        } elseif (isset($str[6]) && ($str[6] == '+' || $str[6] == '-' || $str[6] == '*')){
            $op = $str[6];
            $temp = $str[3] .  $str[4] .  $str[5];
            while (isset($str[$i + 7])) {
                $temp = $temp . $str[$i + 7];
            }
            if ($op == '+') {
                return $r + result($temp);
            } elseif ($op == '-') {
                return $r - result($temp);
            } elseif ($op == '*') {
                return $r * result($temp);
            }
        } else {
            return $r;
        }

    } elseif (isset($str[2]) && ($str[2] != '+' || $str[2] != '-' || $str[2] != '*')) {//-------------
        while (isset($str[$i + 1])) {
            if (!isset($str[$i + 2])) {
                $op = $str[$i];
            } else {
                $temp = $temp . $str[$i + 1];
            }
        }
        echo $str[0] . $op . "!!!!<br>";
        if ($op == '+') {
            return (int)$str[0] + (int)result($temp);
        } elseif ($op == '-') {
            return (int)$str[0] - (int)result($temp);
        } elseif ($op == '*') {
            return (int)$str[0] * (int)result($temp);
        }
    }
}

// $i = 0;
// $tail = "";
// $part1;
// $part2;
// $op;

if (!empty($_GET)) {
    echo $_GET['str'] . " входная строка<br>";
    $str = $_GET['str'];
    echo result($str) . " выходное значение";
}
?>

</body>
</html>