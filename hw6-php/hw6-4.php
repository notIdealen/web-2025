<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home work #6.1</title>
</head>
<body>
  <form action="" method="GET">
    <input type="number" name="sNum" min="0" max="999999" value=0>
    <input type="number" name="eNum" min="0" max="999999" value=0>
    <input type="submit">
  </form>

<?php
$sum1 = 0;
$sum2 = 0;
if (!empty($_GET)) {
    $minT = $_GET['sNum'];
    $maxT = (int)$_GET['eNum'];
    $minT = (int)$minT;
    while ($minT <= $maxT) {
        if ($minT < 1000) {
            echo "No lucky tickets";
            break;
        } elseif ($minT < 10000) {
            $minT = '0' . '0' . (string)$minT;
        } elseif ($minT < 100000) {
            $minT = '0' . (string)$minT;
        } else {
            $minT = (string)$minT;
        }
        $sum1 = (int)$minT[0] + (int)$minT[1] + (int)$minT[2];
        $sum2 = (int)$minT[3] + (int)$minT[4] + (int)$minT[5];  
        if ($sum1 == $sum2) {
            echo $minT . "<br>";
        }
        $minT = (int)$minT;
        $minT++;
    }  
} 
?>

</body>
</html>