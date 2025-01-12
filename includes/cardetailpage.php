<?php
// debugg lines
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$pageInIncludes = true;
include_once "./css_js.inc.php";

require('../functions.inc.php');
$lastId = getIdLastCar();
$id = 1; //by declaring it and only changing it when there's a get value we save 1 else{} in the code
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id < 1 || preg_match('/[\D]/', $id)) {
        $id = 1;
    }
    if ($id > $lastId) {
        $id = $lastId;
    }
}
$car = getCar($id);
// echo '<pre>';
// Print_r($car);
// echo '</pre>';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $car['year'] . " " . $car['make'] . " " . $car['model']; ?></title>
    <link rel="stylesheet" href="../css/cardetailpage.css">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/icons.css" />
    <link rel="stylesheet" href="../dist/<?= $cssPath ?>" />
    <script type="module" src="../dist/<?= $jsPath ?>"></script>


</head>

<body>
    <?php include('hp_header.php'); ?>
    <main>
        <div class="container">
            <div class="g">

                <div id="imgdetail">
                    <img src="<?= $car['ul'] ?>" alt="">
                    <a href="/includes/wishlist.php?add=<?= $car['id'] ?>" id="icon-link">
                        <i class="icon-heart1"></i>
                    </a>

                </div>
                <div id="imgpreviews">
                    <!-- //TODO: after css styling revert from carDummy to car data and uncomment if statements -->
                    <img class="shown" src="<?= $car['ul']; ?>" alt="">

                    <!-- <// if ($car['front'] !== null): ?> -->
                    <img src="<?= isset($car['front']) ? $car['front'] : "..\logo_auto\carnotfound.jpg"; ?>" alt="">
                    <!-- <// endif; if ($car['back'] !== null) :?> -->
                    <img src="<?= isset($car['back']) ? $car["back"] : "..\logo_auto\carnotfound.jpg"; ?>" alt="">
                    <!-- <// endif; if ($car['inner'] !== null): ?> -->
                    <img src="<?= isset($car['inner']) ? $car["inner"] : "..\logo_auto\carnotfound.jpg"; ?>" alt="">
                    <!-- <// endif; ?> -->
                </div>
                <div class="description">

                    <h2><?= $car['make'] . " " . $car['model']; ?> </h2>
                    <h3>&euro;<?= $car['price']; ?></h3>

                    <table>
                        <thead>
                            <tr>
                                <th> Product Specificaties </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bouwjaar: </td>
                                <td><?= $car['year']; ?></td>
                            </tr>
                            <tr>
                                <td>Brandstof: </td>
                                <td><?= $car['fueltype']; ?></td>
                            </tr>
                            <tr>
                                <td>Kleur: </td>
                                <td><?= $car['colour']; ?></td>
                            </tr>
                            <tr>
                                <td>Aantal deuren: </td>
                                <td><?= $car['doors']; ?></td>
                            </tr>
                            <tr>
                                <td>Transmissie: </td>
                                <td><?= $car['transmission']; ?></td>
                            </tr>
                            <tr>
                                <td>KM stand: </td>
                                <td><?= $car['mileage']; ?></td>
                            </tr>
                            <tr>
                                <td>Carrosserie: </td>
                                <td><?= $car['body']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php include 'hp_footer.php'; ?>
</body>

</html>