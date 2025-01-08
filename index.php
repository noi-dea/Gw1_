<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "includes/css_js.inc.php";


session_start();

// if (!isset($_SESSION["uid"])) {

//     header("Location: /includes/login.php");
//     exit;
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GROEPS WEIRK</title>
    <link rel="stylesheet" href="./dist/<?= $cssPath ?>" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./icons.css" />
    <script type="module" src="./dist/<?= $jsPath ?>"></script>
</head>

<body>
    <?php include 'includes/hp_header.php'; ?>

    <main>
        <?php include 'includes/hp_banner.php'; ?>
        <?php include 'includes/hp_searchfilter.php'; ?>
        <?php include 'includes/hp_categorie.php'; ?>

    </main>
    <?php include 'includes/hp_footer.php'; ?>
</body>

</html>