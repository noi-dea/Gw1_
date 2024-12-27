<?php
?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body{
                background-image: linear-gradient(lightgrey, grey);
                height: 100vh;
            }
            .b{
                background-color: grey;
                color: lightgrey;
            }
            .a, .b {
                border: .5px solid aliceblue;
            }
            .a{
                background-color: lightgrey;
                color: grey;
            }
        </style>

    </head>
    <body>
        
        <div class="container">
            
            <div class="page-header">
              <h1>Admin: <small>voeg een auto toe.</small></h1>
            </div>
            
            <form action="" method="POST" role="form" class="form-horizontal">
<!-- input fields with datalists are refered to as dropdown, non-listed values will be dealt with in validation -->
            <!-- Dropdown brand + colour-->
                <div class="form-group a">
                    <label for="brand" class="control-label col-sm-2">Merk:</label>
                    <div class="col-sm-5">
                        <input name="brand" id="input brand" class="form-control" list="brand" placeholder="Merk zoeken...">
                        <datalist id="brand">
                            <option value="Toyota">Toyota</option>
                        </datalist>            
                    </div>
                    <label for="colour" class="control-label col-sm-2">Kleur: </label>
                    <div class="col-sm-3">
                        <select name="colour" class="form-control" id="colour">
                            <option>-- selecteer een kleur --</option>
                            <option>red</option>
                        </select>
                    </div>
                </div>
            <!-- Dropdown model + year-->
                <div class="form-group b">
                    <label for="model" class="control-label col-sm-2">Model:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" list="model" placeholder="zoek model">
                        <datalist name="model" id="model">
                            <option value="M">m</option>
                            <option value="test">test</option>
                        </datalist>
                    </div>
                    <label for="year" class="control-label col-sm-2">Bouwjaar: </label>
                    <div class="col-sm-3">
                        <select name="year" class="form-control" id="year">
                            <option>-- selecteer een jaar --</option>
                            <option>2024</option>
                        </select>
                    </div>
                </div>

                <!-- dropdown bodywork -->
            <div class="form-group a">
                    <label for="bodywork" class="control-label col-sm-2">Carrosserie: </label>
                    <div class="col-sm-5">
                        <select name="bodywork" class="form-control" id="bodywork">
                            <option>-- selecteer een optie --</option>
                            <option>SUV</option>
                        </select>
                    </div>
                    <label for="doors" class="control-label col-sm-2">Aantal deuren: </label>
                    <div class="col-sm-3">
                        <select name="doors" class="form-control" id="doors">
                            <option>-- selecteer een optie --</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>

                <!-- dropdown fueltype + mileage-->
            <div class="form-group b">
                    <label for="fueltype" class="control-label col-sm-2">Brandstof: </label>
                    <div class="col-sm-5">
                        <select name="fueltype" class="form-control" id="fueltype">
                            <option>-- Selecteer een optie --</option>
                            <option>Benzine</option>
                        </select>
                    </div>
                    <label for="mileage" class="control-label col-sm-2">Kilometerstand: </label>
                    <div class="col-sm-3">
                        <input type="text" name="mileage" class="form-control" id="input mileage" placeholder="...km">
                    </div>
                </div>


                                <!-- dropdown transmission -->
            <div class="form-group a">
                    <label for="transmission" class="control-label col-sm-2">Transmissie: </label>
                    <div class="col-sm-5">
                        <select name="transmission" class="form-control" id="transmission">
                            <option>-- selecteer een optie --</option>
                            <option>handgeschakeld</option>
                        </select>
                    </div>
                    <label for="price" class="control-label col-sm-2">Vraagprijs: </label>
                    <div class="col-sm-3">
                        <input type="text" name="price" class="form-control" id="input price" placeholder="... EURO">
                    </div>
                </div>

            <!-- Textfield foto url -->
                <div class="form-group b">
                    <label for="fotoUrl" class="control-label col-sm-2">url: </label>
                    <div class="col-sm-10">
                        <input type="text" name="fotoUrl" class="form-control" id="input fotoUrl" placeholder="https://">
                    </div>
                </div>

            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
            
        </div>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
