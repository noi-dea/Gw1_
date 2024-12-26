<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "includes/css_js.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GROEPS WEIRK</title>
    <link rel="stylesheet" href="./dist/<?= $cssPath ?>" />
    <script type="module" src="./dist/<?= $jsPath ?>"></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <?php include 'includes/banner.php'; ?>
        <?php include 'includes/searchfilter.php'; ?>
        <?php include 'includes/categorie.php'; ?>

    </main>
    <?php include 'includes/footer.php'; ?>
</body>

</html>