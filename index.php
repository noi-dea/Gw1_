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
    <link rel="stylesheet" href="./css/style.css" />
    <script type="module" src="./dist/<?= $jsPath ?>"></script>
</head>

<body>
    <?php include 'includes/hp_header.php'; ?>
    <main>
        <?php include 'includes/hp_banner.php'; ?>
        <?php include 'includes/hp_searchfilter.php'; ?>
        <?php include 'includes/hp_categorie.php'; ?>

    </main>
    <section>
        <div>
            <a href="index.php?makes_id=7" target="_blank">
                <img src="/logo_auto/audi.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=5" target="_blank">
                <img src="/logo_auto/bmw.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=4" target="_blank">
                <img src="/logo_auto/chevrolet.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=15" target="_blank">
                <img src="/logo_auto/chrysler.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=2" target="_blank">
                <img src="/logo_auto/ford.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=3" target="_blank">
                <img src="/logo_auto/honda.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=9" target="_blank">
                <img src="/logo_auto/hyundai.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=14" target="_blank">
                <img src="/logo_auto/jeep.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=13" target="_blank">
                <img src="/logo_auto/kia.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=6" target="_blank">
                <img src="/logo_auto/mercedes.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=8" target="_blank">
                <img src="/logo_auto/nissan.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=12" target="_blank">
                <img src="/logo_auto/subaru.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=11" target="_blank">
                <img src="/logo_auto/tesla.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=1" target="_blank">
                <img src="/logo_auto/toyota.png" alt="Klik hier">
            </a>
        </div>
        <div>
            <a href="index.php?makes_id=10" target="_blank">
                <img src="/logo_auto/volkswagen.png" alt="Klik hier">
            </a>
        </div>
    </section>
    <?php include 'includes/hp_footer.php'; ?>
</body>

</html>