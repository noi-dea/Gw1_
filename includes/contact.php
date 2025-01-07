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
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../dist/<?= $cssPath ?>" />
    <script type="module" src="../dist/<?= $jsPath ?>"></script>


</head>

<body>
    <?php include('hp_header.php'); ?>
    <main>
        <form class="contact-form" action="" method="GET">
            <div class=contact-session>
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" placeholder="Location">
            </div>

            <div class=contact-session>
                <label for="datum">Date:</label>
                <input type="date" id="datum" name="datum">
            </div>

            <button type="submit"> Send</button>
        </form>
    </main>
    <?php include 'hp_footer.php'; ?>
</body>

</html>