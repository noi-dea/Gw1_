<?php
// debugg lines
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pageInIncludes = true;
include_once "./css_js.inc.php";

require('../functions.inc.php');
$lastId = getIdLastCar();
$id = 1; //by declaring it and only changing it when there's a get value we save 1 else{} in the code
if (isset($_GET['id'])){
    $id = $_GET['id'];
    if ($id < 1 || preg_match('/[\D]/', $id)){
        $id = 1;
    }
    if ($id > $lastId){
        $id = $lastId;
    }
}
$car = getCar($id);
// echo '<pre>';
// Print_r($car);
// echo '</pre>';

// dummydata for css purposes
$carDummy = [];
$carDummy['front'] = 'https://images.unsplash.com/photo-1614687153862-b0e115ebcef1?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bmV3JTIwY2FyfGVufDB8fDB8fHww';
$carDummy['back'] = 'https://static.vecteezy.com/system/resources/thumbnails/026/992/343/small_2x/classic-modified-car-with-dark-smokie-background-ai-generative-free-photo.jpg';
$carDummy['inner'] = 'https://cdn.pixabay.com/photo/2015/12/19/10/27/seat-cushion-1099616_1280.jpg';
// end dummydata
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $car['year'] . " " . $car['make'] . " " . $car['model']; ?></title>
    <link rel="stylesheet" href="../dist/<?= $cssPath ?>" />
    <script type="module" src="../dist/<?= $jsPath ?>"></script>


</head>
<body>
    <?php include('./hp_header.php'); ?>
    <main>
        <div class="container">
            <div class="g">

                    <div id="imgdetail">
                        <img src="<?= $car['ul']?>" alt="">
                    </div>
                    <div id="imgpreviews"> 
                        <!-- //TODO: after css styling revert from carDummy to car data and uncomment if statements -->
                         <img class="shown" src="<?= $car['ul']; ?>" alt="">
                        <!-- <// if ($car['front'] !== null): ?> -->
                        <img src="<?= $carDummy['front']; ?>" alt=""> 
                        <!-- <// endif; if ($car['back'] !== null) :?> -->
                        <img src="<?= $carDummy['back']; ?>" alt=""> 
                        <!-- <// endif; if ($car['inner'] !== null): ?> -->
                        <img src="<?= $carDummy['inner']; ?>" alt=""> 
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
                                <td>Bouwjaar: </td><td><?= $car['year']; ?></td>
                            </tr>
                            <tr>
                                <td>Brandstof: </td><td><?= $car['fueltype']; ?></td>
                            </tr>
                            <tr>
                                <td>Kleur: </td><td><?= $car['colour']; ?></td>
                            </tr>
                            <tr>
                                <td>Aantal deuren: </td><td><?= $car['doors']; ?></td>
                            </tr>
                            <tr>
                                <td>Transmissie: </td><td><?= $car['transmission']; ?></td>
                            </tr>
                            <tr>
                                <td>KM stand: </td><td><?= $car['mileage']; ?></td>
                            </tr>
                            <tr>
                                <td>Carrosserie: </td><td><?= $car['body']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>
