<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home work #6.1</title>
</head>
<body>
  <form action="" method="POST">
    <input type="number" name="year"min="-30000" max="30000" value=0>
    <input type="submit">
  </form>

<?php
if (!empty($_POST)) {
    $year = $_POST['year'];
    if ($year % 4 === 0) {
        echo "<p>{$year} - YES</p>";
    } else {
        echo "<p>{$year} - NO</p>";
    }
}
?>

</body>
</html>