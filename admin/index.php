<?php
// session_start();

// Start code
$_SERVER["admin"] = true;
include_once "../includes/css_js.inc.php";
include('../functions.inc.php');
include('../includes/hp_header.php');
include('./admin.validation.php');

if (isset($_SESSION["uid"])) {
    $uid = $_SESSION["uid"];
    $result = IsAdmin($uid);

    if (!$result) {
        header("Location: ../includes/login.php");
    }
}
// message for after successful addition new car
if (isset($_GET['message'])) {
    $msg = $_GET['message'];
}

// variables
// get car data
$cars = getAdminCars($uid);
// pagination variables
$pagefile = "index.php";
//-----// limiting cars per page to 5
$pagelimit = 5;
//-----// pageindexes
$firstpage = 1;
$lastpage = ceil(count($cars) / $pagelimit);
include('../includes/pagination.validation.php');
//-----// car indexes
$firstIndex = 0 + (($pagenr - 1) * $pagelimit);
$lastIndex = $firstIndex + 4;
if ($lastIndex > count($cars)-1) {
    $lastIndex = count($cars)-1;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN HOMEPAGE</title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
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


        <span class="label" style="color:black;">Getoonde resultaten: <?= $firstIndex+1 . ' - ' . $lastIndex+1; ?> van <?= count($cars); ?></span>


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
                        <?php for ($i = $firstIndex; $i <= $lastIndex; $i++):?>
                                <tr>
                                    <td><img src="<?= $cars[$i]['fotoUrl']; ?>" alt="foto van de auto" style="height:50px;"></td>
                                    <td><?= $cars[$i]['id']; ?></td>
                                    <td><?= $cars[$i]['make']; ?></td>
                                    <td><?= $cars[$i]['model']; ?></td>
                                    <td><?= $cars[$i]['year']; ?></td>
                                    <td><?= $cars[$i]['fueltype']; ?></td>
                                    <td><?= $cars[$i]['colour']; ?></td>
                                    <td><?= $cars[$i]['doors']; ?></td>
                                    <td><?= $cars[$i]['transmission']; ?></td>
                                    <td><?= $cars[$i]['price']; ?></td>
                                    <td><?= $cars[$i]['mileage']; ?></td>
                                    <td><?= $cars[$i]['bodywork']; ?></td>
                                    <!-- placeholders, functionality to be added -->
                                    <td><a href="edit.php?id=<?= $cars[$i]['id']; ?>" class="btn btn-primary">Edit</a></td>
                                    <td><a href="index.php?id=<?= $cars[$i]['id']; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                        <?php endfor;?>
                </tbody>
            </table>
        </div> <!--end tag table div-->

    </div> <!--end tag container div-->

    <?php include('../includes/pagination.logic.php'); ?>
    <?php include('../includes/hp_footer.php'); ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>