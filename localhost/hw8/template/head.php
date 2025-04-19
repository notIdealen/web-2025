<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href=<?=$commonCss?> type="text/css">

    <?php if ($headerCss) : ?>
        <link rel="stylesheet" href=<?= $headerCss ?> type="text/css">
    <?php endif; ?>

    <?php if ($menuCss) : ?>
        <link rel="stylesheet" href=<?= $menuCss ?> type="text/css">
    <?php endif; ?>
</head>