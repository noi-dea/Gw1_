<?php
$_SERVER['admin'] = true;

session_start();
include_once "../includes/css_js.inc.php";
include('../functions.inc.php');
include('admin.validation.php');
include('../includes/hp_header.php');

$uid = $_SESSION['uid'];

function keepValue($var)
{
    if (isset($var)) {
        echo "value = $var";
    }
}

function keepSelection($var1, $var2)
{
    $isSelected = false;
    if (isset($var1)) {
        if ($var1 == $var2) {
            $isSelected = true;
        }
    }
    if ($isSelected) {
        echo 'selected';
    }
}
//exit;
?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a car</title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../dist/<?= $cssPath ?>" />
    <script type="module" src="../dist/<?= $jsPath ?>"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(lightgrey, grey);
            height: 100vh;
        }

        .b {
            background-color: grey;
            color: lightgrey;
        }

        .a,
        .b {
            border: .5px solid aliceblue;
        }

        .a {
            background-color: lightgrey;
            color: grey;
        }
    </style>
    <script>
        function selectValue() {
            const item = document.getElementById('input');
            item.innerHTML += 'label="testing"';
        }
    </script>
</head>

<body>

    <div class="container">

        <div class="page-header">
            <h1>Admin: <small>voeg een auto toe.</small></h1>
        </div>

        <!-- Error messages -->
        <?php if (count($errors) > 0): ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php foreach ($errors as $error): ?>
                    <strong>FOUT :</strong> <?= $error; ?> <br>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <!-- End Error messages -->

        <form action="" method="POST" role="form" class="form-horizontal">
            <!-- input fields with datalists are refered to as dropdown, non-listed values will be dealt with in validation -->
            <!-- Dropdown brand + colour-->
            <div class="form-group a">
                <!-- ------------------------------------------------   -->
                <label for="make" class="control-label col-sm-2">Merk:</label>
                <div class="col-sm-5">
                    <input name="make" id="input make" class="form-control" list="make" placeholder="Merk zoeken..." <?php keepValue($_POST['make']); ?>>
                    <datalist id="make">
                        <?php foreach ($makes as $make): ?>
                            <option value="<?= $make['id']; ?>" script="onClick=selectValue();"><?= $make['makeName']; ?></option>
                        <?php endforeach; ?>
                    </datalist>
                </div>
                <!-- --------------------------------------------------------------- -->
                <label for="colour" class="control-label col-sm-2">Kleur: </label>
                <div class="col-sm-3">
                    <select name="colour" class="form-control" id="colour">
                        <option>-- selecteer een kleur --</option>
                        <?php foreach ($colours as $colour): ?>
                            <option <?php keepSelection($_POST['colour'], $colour['id']); ?> value="<?= $colour['id']; ?>"><?= $colour['colourName']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- Dropdown model + year-->
            <div class="form-group b">
                <label for="model" class="control-label col-sm-2">Model:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="model" placeholder="Geef het model in" <?php keepValue($_POST['model']); ?>>

                </div>
                <label for="year" class="control-label col-sm-2">Bouwjaar: </label>
                <div class="col-sm-3">
                    <select name="year" class="form-control" id="year">
                        <option>-- selecteer een jaar --</option>
                        <!-- Limit to cars up to 50 years old -->
                        <?php for ($i = date('Y'); $i >= date('Y') - 50; $i--): ?>
                            <option <?php keepSelection($_POST['year'], $i); ?>><?= $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>

            <!-- dropdown bodywork -->
            <div class="form-group a">
                <label for="bodywork" class="control-label col-sm-2">Carrosserie: </label>
                <div class="col-sm-5">
                    <select name="bodywork" class="form-control" id="bodywork">
                        <option>-- selecteer een optie --</option>
                        <?php foreach ($bodyworks as $body): ?>
                            <option <?php keepSelection($_POST['bodywork'], $body['id']); ?> value="<?= $body['id']; ?>"><?= $body['typeName']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label for="doors" class="control-label col-sm-2">Aantal deuren: </label>
                <div class="col-sm-3">
                    <select name="doors" class="form-control" id="doors">
                        <option>-- selecteer een optie --</option>
                        <!-- Whilst 1 door and 6+ door cars exist, I'm limiting to 2-5 -->
                        <?php for ($i = 2; $i < 6; $i++): ?>
                            <option <?php keepSelection($_POST['doors'], $i); ?>><?= $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>

            <!-- dropdown fueltype + mileage-->
            <div class="form-group b">
                <label for="fueltype" class="control-label col-sm-2">Brandstof: </label>
                <div class="col-sm-5">
                    <select name="fueltype" class="form-control" id="fueltype">
                        <option>-- Selecteer een optie --</option>
                        <?php for ($i = 0; $i < count($ftypes); $i++): ?>
                            <option <?php keepSelection($_POST['fueltype'], $ftypes[$i]); ?>><?= $ftypes[$i]; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <label for="mileage" class="control-label col-sm-2">Kilometerstand: </label>
                <div class="col-sm-3">
                    <input <?php keepValue($_POST['mileage']); ?> type="number" name="mileage" class="form-control" id="input mileage" placeholder="...km">
                </div>
            </div>


            <!-- dropdown transmission -->
            <div class="form-group a">
                <label for="transmission" class="control-label col-sm-2">Transmissie: </label>
                <div class="col-sm-5">
                    <select name="transmission" class="form-control" id="transmission">
                        <option>-- selecteer een optie --</option>
                        <?php for ($i = 0; $i < count($tmissions); $i++): ?>
                            <option <?php keepSelection($_POST['transmission'], $tmissions[$i]); ?>><?= $tmissions[$i]; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <label for="price" class="control-label col-sm-2">Vraagprijs: </label>
                <div class="col-sm-3">
                    <input type="text" name="price" class="form-control" id="input price" placeholder="... EURO" <?php keepValue($_POST['price']); ?>>
                </div>
            </div>

            <!-- Textfield foto url -->
            <div class="form-group b">
                <label for="fotoUrl" class="control-label col-sm-2">*url: </label>
                <div class="col-sm-10">
                    <input type="text" name="fotoUrl" class="form-control" id="input fotoUrl" placeholder="https://" <?php keepValue($_POST['fotoUrl']); ?>>
                </div>
            </div>

            <div class="form-group">
                <i class="col-sm-11"></i><button type="submit" name="submit" value="1" class="btn btn-secondary col-sm-1">Submit</button>
            </div>
        </form>

        <div>
            *toegelaten extensies: png, jpeg, jpg & webp.
        </div>
    </div>

    <?php include('../includes/hp_footer.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>