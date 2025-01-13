<?php
session_start();
$pageInIncludes = true;
include_once "./css_js.inc.php";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact </title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../dist/<?= $cssPath ?>" />
    <script type="module" src="../dist/<?= $jsPath ?>"></script>


</head>

<body>
    <?php include('hp_header.php'); ?>
    <main>
        <form class="contact-form" action="" method="GET">
            <img src="/images/under_construction.jpg" alt="">

            <button type="submit"> Send</button>
        </form>
    </main>
    <?php include 'hp_footer.php'; ?>
</body>

</html>