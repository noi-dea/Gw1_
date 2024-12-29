<?php

$_SERVER["admin"] = true;
include_once "../includes/css_js.inc.php";
$msg = $_GET['message'];
// dummy data (will be replaced after creation databasefunction)
$cars = [0 => ['id'=>1,'brand'=>'Toyota','model'=>'M','year'=>2014,'fueltype'=>'benzine','colour'=>'red','doors' => 5,'transmission'=>'handgeschakeld','price'=>10000.99,'mileage'=>5000,'bodywork'=>'suv','fotoUrl'=>'https://nl.toyota.be/content/dam/toyota/nmsc/luxemburg/de/RAV4.png'],1 => ['id'=>2,'brand'=>'Toyota','model'=>'M','year'=>2014,'fueltype'=>'benzine','colour'=>'red','doors'=>5,'transmission'=>'handgeschakeld','price'=>10000.99,'mileage'=>5000,'bodywork'=>'suv','fotoUrl' => 'https://nl.toyota.be/content/dam/toyota/nmsc/luxemburg/de/RAV4.png']]
// end dummy data
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
    <style>body{height: 100vh;background-image: linear-gradient(lightgrey, grey);}</style>
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
                        <th>STAND KM</th>
                        <th>CARROSSERIE</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($cars as $car): ?>
                    <tr>
                        <td><img src="<?= $car['fotoUrl']; ?>" alt="foto van de auto" style="height:50px;"></td>
                        <td><?= $car['id']; ?></td>
                        <td><?= $car['brand']; ?></td>
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
                        <td><button type="button" class="btn btn-primary">edit</button></td>
                        <td><button type="button" class="btn btn-danger">delete</button></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div> <!--end tag table div-->

    </div> <!--end tag container div-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>