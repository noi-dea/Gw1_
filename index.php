<?php

include_once "includes/css_js.inc.php";




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GROEPS WEIRK</title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./dist/<?= $cssPath ?>" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./icons.css" />
    <script type="module" src="./dist/<?= $jsPath ?>"></script>
</head>

<body>
    <div>
        <?php include 'includes/hp_header.php'; ?>
        <main>
            <?php include 'includes/hp_hero.php'; ?>
        </main>
        <?php include 'includes/hp_footer.php'; ?>
    </div>
</body>

</html>