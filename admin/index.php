<?php
// debugg lines
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start code
$_SERVER["admin"] = true;
include_once "../includes/css_js.inc.php";
<<<<<<< HEAD
include('../functions.inc.php');
include('../includes/hp_header.php');
// message for after successful addition new car
if (isset($_GET['message'])) {
=======
include ('../functions.inc.php');
include('../includes/hp_header.php');
// message for after successful addition new car
if (isset($_GET['message'])){
>>>>>>> 1aa87cde9445627391f5e08805be18f028127efd
    $msg = $_GET['message'];
}

// variables
// get car data
$cars = getAdminCars(1);
// pagination variables
//-----// limiting cars per page to 5
$pagelimit = 5;
//-----// pageindexes
$firstpage = 1;
<<<<<<< HEAD
$lastpage = ceil(count($cars) / $pagelimit);
include('../includes/pagination.validation.php');
//-----// car indexes
$firstIndex = 1 + (($pagenr - 1) * $pagelimit);
$lastIndex = $firstIndex + 4;
if ($lastIndex > count($cars)) {
=======
$lastpage = ceil(count($cars)/$pagelimit);
include ('../includes/pagination.validation.php');
//-----// car indexes
$firstIndex = 1+(($pagenr-1)*$pagelimit);
$lastIndex = $firstIndex + 4;
if ($lastIndex > count($cars)){
>>>>>>> 1aa87cde9445627391f5e08805be18f028127efd
    $lastIndex = count($cars);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN HOMEPAGE</title>
    <link rel="stylesheet" href="../dist/<?= $cssPath ?>" />
    <script type="module" src="../dist/<?= $jsPath ?>"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">


        <div class="page-header">
            <h1>Overzicht: <small>beheer je autos</small></h1>
        </div>

        <?php if (isset($msg)): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong></strong> <?= $msg; ?>
            </div>
        <?php endif; ?>

        <a class="btn btn-info" href="create.php" role="button">auto toevoegen</a>

        
        <span class="label" style="color:black;">Getoonde resultaten: <?= $firstIndex . ' - ' . $lastIndex; ?> van <?= count($cars); ?></span>
        

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>MERK</th>
                        <th>MODEL</th>
                        <th>JAAR</th>
                        <th>BRANDSTOF</th>
                        <th>KLEUR</th>
                        <th>DEUREN</th>
                        <th>TRANSMISSIE</th>
                        <th>PRIJS (&euro;)</th>
                        <th>KM</th>
                        <th>CARROSSERIE</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cars as $car): ?>
                        <?php for ($i = $firstIndex; $i < $firstIndex+5; $i++){
                            if ($car['id'] == $i): ?>
                        <tr>
                            <td><img src="<?= $car['fotoUrl']; ?>" alt="foto van de auto" style="height:50px;"></td>
                            <td><?= $car['id']; ?></td>
                            <td><?= $car['make']; ?></td>
                            <td><?= $car['model']; ?></td>
                            <td><?= $car['year']; ?></td>
                            <td><?= $car['fueltype']; ?></td>
                            <td><?= $car['colour']; ?></td>
                            <td><?= $car['doors']; ?></td>
                            <td><?= $car['transmission']; ?></td>
                            <td><?= $car['price']; ?></td>
                            <td><?= $car['mileage']; ?></td>
                            <td><?= $car['bodywork']; ?></td>
                            <!-- placeholders, functionality to be added -->
                            <td><a href="edit.php?id=<?php echo $car['id']; ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $car['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php endif; } ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> <!--end tag table div-->

    </div> <!--end tag container div-->

    <?php include ('../includes/pagination.logic.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>