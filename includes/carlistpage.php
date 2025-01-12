<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("../functions.inc.php");

session_start();

// echo '<pre>';
// Print_r($_SESSION);
// echo '</pre>';

$pageInIncludes = true;
include_once("./css_js.inc.php");

$cars = getAllCars();
// print "<pre>";
// print_r($cars);
// print "<pre>";
//-----// pagination variables
$pagefile = "carlistpage.php";
$firstpage = 1;
$pagelimit = 12;
$lastpage = ceil(count($cars) / $pagelimit);
include("./pagination.validation.php");

//-----// car indexes
$firstIndex = 0 + (($pagenr - 1) * $pagelimit);
$lastIndex = $firstIndex + $pagelimit - 1;
if ($lastIndex > count($cars) - 1) {
    $lastIndex = count($cars) - 1;
}
if (isset($_SESSION['results']) && is_array($_SESSION['results'])) {
    $results = $_SESSION['results'];


    unset($_SESSION['results']);
} else {
    $results = [];
    $results[0] = allCars();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./dist/<?= $cssPath ?>" />
    <link rel="stylesheet" href="/css/style.css" />
    <script type="module" src="./dist/<?= $jsPath ?>"></script>
</head>

<body>
    <?php include 'hp_header.php'; ?>
    <main>
        <section class="sectioncarlistpage">
            <?php for ($i = $firstIndex; $i <= $lastIndex; $i++): ?>
                <article class="articlecarlistpage">
                    <div class="divcarlistpage">
                        <a href="./cardetailpage.php?id=<?= $cars[$i]['id']; ?>">
                            <img src="<?= $cars[$i]['fotoURL']; ?>" alt="foto van de auto">
                        </a>
                    </div>
                    <p><?= $cars[$i]['year'] . " " . $cars[$i]['make'] . " " . $cars[$i]['model']; ?></p>
                </article>
            <?php endfor; ?>
        </section>
    </main>
    <?php include("./pagination.logic.php"); ?>
    <?php include 'hp_footer.php'; ?>
</body>

</html>