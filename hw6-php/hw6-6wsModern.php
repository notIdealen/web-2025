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
function operation(int $n1, int $n2, string $op) : int {
    return $op == '+' ? $n1 + $n2 : ($op == '-' ? $n1 - $n2 : $n1 * $n2);
}
function result($ar) : string {
    if (is_string($ar)) {
        $ar = explode(' ', $ar);
    }
    foreach ($ar as $k => $v) {
        if ($v === '+' || $v === '-' || $v === '*') {
            $ar[$k - 2] = operation($ar[$k - 2], $ar[$k - 1], $v);
            array_splice($ar, $k - 1, 2);
            break;
        } else {
            $v = (int)$v;
        }
    }
    return count($ar) > 1 ? result($ar) : $ar[0];
}

if (!empty($_GET)) : ?>
    <p>Входная строка: <?= $_GET['str'] ?></p>
    <p class="mod">Результат          : <?= result($_GET['str']) ?></p> 
<?php endif; ?>

</body>
</html>