<?php
function giveImageName(string $folderName) : string {
    $ar = explode('_', $folderName);
    $folderName = $ar[0] . substr($ar[1], 0, 1) . substr($ar[2], 0, 1);
    $folderName = $folderName . '_post_' . rand(1, 999999) . '-' . date('Y-m-d');
    return $folderName;
}
?>