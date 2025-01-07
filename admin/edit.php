<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);
$_SERVER['admin'] = true;
include_once "../includes/css_js.inc.php";
include('../functions.inc.php');
// include('admin.validation.php');
include('../includes/hp_header.php');


$id = $_GET["id"];
$cars = getCar($id);
print '<pre>';
print_r($cars);
print '</pre>';
print '<pre>';
print_r($_GET);
print '</pre>';

?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>
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
            const item = querySelector('#input');
            item.innerHTML += 'label="testing"';
        }
    </script>
</head>

<body>

    <div class="container">
        <form action="" method="GET" role="form" class="form-horizontal">
            <div class="form-group b">
                <label for="fotoUrl" class="control-label col-sm-2">Image: </label>
                <div class="col-sm-10">
                    <input type="text" name="fotoUrl" class="form-control" id="input_fotoUrl" value="<?php echo $cars["ul"]; ?>">
                </div>
            </div>
            <div class="form-group b">
                <label for="fotoUrlFront" class="control-label col-sm-2">Front: </label>
                <div class="col-sm-10">
                    <input type="text" name="fotoUrlFront" class="form-control" id="input_fotoUrlFront" value="<?php echo isset($cars["front"]) ? $cars["front"] : ''; ?>">
                </div>
            </div>
            <div class="form-group b">
                <label for="fotoUrlBack" class="control-label col-sm-2">Back: </label>
                <div class="col-sm-10">
                    <input type="text" name="fotoUrlBack" class="form-control" id="input_fotoUrlBack" value="<?php echo isset($cars["back"]) ? $cars["back"] : ''; ?>">
                </div>
            </div>
            <div class="form-group b">
                <label for="fotoUrlInner" class="control-label col-sm-2">Inner: </label>
                <div class="col-sm-10">
                    <input type="text" name="fotoUrlInner" class="form-control" id="input_fotoUrlInner" value="<?php echo isset($cars["inner"]) ? $cars["inner"] : ''; ?>">
                </div>
            </div>
            <div class="form-group b">
                <label for="prize" class="control-label col-sm-2">Vraagprijs: </label>
                <div class="col-sm-10">
                    <input type="text" name="prize" class="form-control" id="input_prize" value=<?php echo $cars["price"]; ?>>
                </div>
            </div>
            <div class="form-group b">
                <label for="mileage" class="control-label col-sm-2">Kilometerstand: </label>
                <div class="col-sm-10">
                    <input type="text" name="mileage" class="form-control" id="input_mileage" value=<?php echo $cars["mileage"]; ?>>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="action" value="update" class="btn btn-primary">Opslaan</button>
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