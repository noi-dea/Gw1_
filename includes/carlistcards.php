<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require("../functions.inc.php");

$pageInIncludes = true;
include_once("./css_js.inc.php");

$cars = getAllCars();


$pagefile = "carlistcards.php";
$firstpage = 1;
$pagelimit = 10;
$lastpage = ceil(count($cars) / $pagelimit);
include("./pagination.validation.php");


$firstIndex = 0 + (($pagenr - 1) * $pagelimit);
$lastIndex = $firstIndex + $pagelimit - 1;
if ($lastIndex > count($cars) - 1) {
    $lastIndex = count($cars) - 1;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car stock</title>
    <link rel="stylesheet" href="../dist/<?= $cssPath ?>" />
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <script type="module" src="../dist/<?= $jsPath ?>"></script>

</head>

<body>
    <?php include('./hp_header.php'); ?>
    <main>
        <section>
            <?php for ($i = $firstIndex; $i <= $lastIndex; $i++): ?>
                <article>
                    <div>
                        <a href="./cardetailpage.php?id=<?= $cars[$i]['id']; ?>">
                            <img src="<?= $cars[$i]['fotoURL']; ?>" alt="foto van de auto">
                        </a>
                    </div>
                    <p><?= $cars[$i]['year'] . " " . $cars[$i]['make'] . " " . $cars[$i]['model']; ?></p>
                </article>
            <?php endfor; ?>
        </section>
    </main>
    <?php
    include("./pagination.logic.php");
    include("hp_footer.php");
    ?>
</body>

</html>