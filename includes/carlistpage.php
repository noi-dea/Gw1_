<?php


require("../functions.inc.php");

session_start();


$pageInIncludes = true;
include_once("./css_js.inc.php");

$cars = getAllCars();

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
    $lastpage = ceil(count($results) / $pagelimit);
    $firstIndex = 0 + (($pagenr - 1) * $pagelimit);
    $lastIndex = $firstIndex + $pagelimit - 1;
    if ($lastIndex > count($results) - 1) {
        $lastIndex = count($results) - 1;
    }
    unset($_SESSION['results']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- OG tags start -->
    <?php 
    $ogPath = "cars";
    $ogImg = "../images/banner4.jpg";
    $ogDesc = "Browse cars to your hearts content and find your future ride";
    include('./ogTags.php');
    ?>
    <!-- OG tags end -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/pagination.css">
    <link rel="stylesheet" href="./dist/<?= $cssPath ?>" />
    <link rel="stylesheet" href="/css/style.css" />
    <script type="module" src="./dist/<?= $jsPath ?>"></script>
</head>

<body>
    <?php include 'hp_header.php'; ?>
    <main>
        <?php if (!isset($results)) { ?>
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
        <?php } else { ?>
            <section class="sectioncarlistpage">
                <?php if (!empty($results)) {
                    // Door alle arrays in $results heen lopen
                    foreach ($results as $result_set) {
                        // Als de set van auto's niet leeg is, doorloop dan de auto's
                        if (!empty($result_set)) {
                            foreach ($result_set as $car): ?>
                                <article class="articlecarlistpage">
                                    <div class="divcarlistpage">
                                        <a href="./cardetailpage.php?id=<?= $car['id']; ?>">
                                            <img src="<?= $car['fotoUrl']; ?>" alt="foto van de auto">
                                        </a>
                                    </div>
                                    <p><?= $car['year'] . " " . $car['make'] . " " . $car['model']; ?></p>
                                </article>
                <?php endforeach;
                        }
                    }
                } ?>
            </section>
        <?php } ?>
    </main>
    <?php include("./pagination.logic.php"); ?>
    <?php include 'hp_footer.php'; ?>
</body>

</html>