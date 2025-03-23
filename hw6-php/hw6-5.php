<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home work #6.1</title>
</head>
<body>
  <form action="" method="GET">
    <input type="number" name="num" min="0" max="999999" value=0>
    <input type="submit">
  </form>

<?php
function factorial(int $f) : int {
        return $f > 1 ? $f * factorial($f - 1) : 1;
    }
if (!empty($_GET)) {
    echo factorial($_GET['num']);
}
?>

</body>
</html>