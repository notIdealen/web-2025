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
//проблемма в том что число занимает любую длину, с массивом проще
function result($str) : int {
    $i = 0;
    $nStr = "";
    $op = false;
    while (isset($str[$i])) {
        if (!$op && ($str[$i] === '+' || $str[$i] === '-' || $str[$i] === '*')) {
            $nStr = $nStr . operation($str[$i - 4], $str[$i - 2], $str[$i]);
            $op = true;
            $i += 2;
            continue;
        } 
        if ($i >= 4) {
            if (!$op) {
                $nStr = $nStr . $str[$i - 4]; 
            } else {
                $nStr = $nStr . $str[$i];
            }
        } 
        $i++;
    }
    return isset($nStr[1]) ? result($Str) : (int)$nStr;
}

if (!empty($_GET)) : ?>
    <p>Входная строка: <?= $_GET['str'] ?></p>
    <p class="mod">Результат          : <?= result($_GET['str']) ?></p> 
<?php endif; ?>

</body>
</html>