<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home work #6.1</title>
  <style>.mod{white-space: pre;}</style>
</head>
<body>
  <form>
    <input type="text" name="str">
    <input type="submit">
  </form>

<?php
function operation(string $n1, string $n2, string $op) : string {
    if ($op == '+') {
        return (int)$n1 + (int)$n2;
    } elseif ($op == '-') {
        return (int)$n1 - (int)$n2;
    } elseif ($op == '*') {
        return (int)$n1 * (int)$n2;
    }
}

function result($ar) : int {
    $i = 0;
    $nAr = [];
    $op = false;
    while (isset($ar[$i])) {
        if (!$op && ($ar[$i] === '+' || $ar[$i] === '-' || $ar[$i] === '*')) {
            array_push($nAr, operation($ar[$i - 2], $ar[$i - 1], $ar[$i]));
            $op = true;
            $i++;
            continue;
        } 
        if ($i >= 2) {
            if (!$op) {
                array_push($nAr, $ar[$i - 2]);
            } else {
                array_push($nAr, $ar[$i]);
            }
        } 
        $i++;
    }
    return isset($nAr[1]) ? result($nAr) : (int)$nAr[0];
}

if (!empty($_GET)) : ?>
    <p>Входная строка: <?= $_GET['str'] ?></p>
    <p class="mod">Результат          : <?= result($_GET['str']) ?></p> 
<?php endif; ?>

</body>
</html>