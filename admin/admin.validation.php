<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$errors = [];

// echo '<pre>';
// Print_r($_POST);
// echo '</pre>';
// data-variables
$makes = getMakes();
$colours = getColours();
$bodyworks = getBodyworks();
$ftypes = ['benzine', 'diesel', 'elektrisch', 'hybride'];
$tmissions = ['handmatig', 'automatisch'];

// start validation
if (isset($_POST['submit'])) {
    // creation variables 
    $make = 0;
    $model = '';
    $colour = 0;
    $year = 0;
    $body = 0;
    $doors = 0;
    $fuel = '';
    $mileage = 0;
    $price = 0;
    $transmission = '';
    $url = '';

    // validation 1st field: make
    if (!$_POST['make']) {
        $errors[] = 'Merk is een verplicht veld!!!';
    } else {
        $make = $_POST['make'];
        if (preg_match('/[^0-9]/', $make)) {
            $errors[] = 'Ongeldige selectie: Merk!!!';
        } else if ($make == 0 || $make > count($makes)) {
            $errors[] = 'Ongeldige selectie: Merk!!!';
        }
    }

    // validation 2nd field: colour
    if (!$_POST['colour'] || $_POST['colour'] == '-- selecteer een kleur --') {
        $errors[] = 'Kleur is een verplicht veld!!!';
    } else {
        $colour = $_POST['colour'];
        if (preg_match('/[^0-9]/', $colour)) {
            $errors[] = 'Ongeldige selectie: Kleur!!!';
        } else if ($colour == 0 || $colour > count($colours)) {
            $errors[] = 'Ongeldige selectie: Kleur!!!';
        }
    }
    // validation 3rd field: models
    if (!$_POST['model']) {
        $errors[] = 'Model is een verplicht veld!!!';
    } else {
        $model = $_POST['model'];
    }

    // validation 4th field: year
    if (!$_POST['year'] || $_POST['year'] == '-- selecteer een jaar --') {
        $errors[] = 'Jaar is een verplicht veld!!!';
    } else {
        $year = $_POST['year'];
        if (preg_match('/[^0-9]/', $year)) {
            $errors[] = 'Ongeldige selectie: Jaar!!!';
        } else if ($year > date('Y') || $year < date('y') - 50) {
            $errors[] = 'Ongeldige selectie: Jaar!!!';
        }
    }

    // validation 5th field: Bodyworks
    if (!$_POST['bodywork'] || $_POST['bodywork'] == '-- selecteer een optie --') {
        $errors[] = 'Carrosserie is een verplicht veld!!!';
    } else {
        $body = $_POST['bodywork'];
        if (preg_match('/[^0-9]/', $body)) {
            $errors[] = 'Ongeldige selectie: Carrosserie!!!';
        } else if ($body == 0 || $body > count($bodyworks)) {
            $errors[] = 'Ongeldige selectie: Carrosserie!!!';
        }
    }

    // validation 6th field: doors
    if (!$_POST['doors'] || $_POST['doors'] == '-- selecteer een optie --') {
        $errors[] = 'Aantal deuren is een verplicht veld!!!';
    } else {
        $doors = $_POST['doors'];
        if (preg_match('/[^0-9]/', $doors)) {
            $errors[] = 'Ongeldige selectie: Aantal deuren!!!';
        } else if ($doors < 2 || $doors > 5) {
            $errors[] = 'Ongeldige selectie: Aantal deuren!!!';
        }
    }

    // validation 7th field: fueltype
    if (!$_POST['fueltype'] || $_POST['fueltype'] == '-- selecteer een optie --') {
        $errors[] = 'Brandstof is een verplicht veld!!!';
    } else {
        $fuel = $_POST['fueltype'];
        if (preg_match('/[^a-zA-Z]/', $fuel)) {
            $errors[] = 'Ongeldige selectie: Brandstof!!!';
        } else if (!in_array($fuel, $ftypes)) {
            $errors[] = 'Ongeldige selectie: Brandstof!!!';
        }
    }

    // validation 8th field: mileage
    if (!$_POST['mileage']) {
        $errors[] = 'Kilometerstand is een verplicht veld!!!';
    } else {
        $mileage = $_POST['mileage'];
        if (preg_match('/[^0-9]/', $mileage)) {
            $errors[] = 'Ongeldige ingave: Kilometerstand!!!';
        } else if ($mileage < 0) {
            $errors[] = 'Ongeldige ingave: Kilometerstand!!!';
        }
    }

    // validation 9th field: transmission
    if (!$_POST['transmission'] || $_POST['transmission'] == '-- selecteer een optie --') {
        $errors[] = 'Transmissie is een verplicht veld!!!';
    } else {
        $transmission = $_POST['transmission'];
        if (preg_match('/[^a-zA-Z]/', $transmission)) {
            $errors[] = 'Ongeldige selectie: Transmissie!!!';
        } else if (!in_array($transmission, $tmissions)) {
            $errors[] = 'Ongeldige selectie: Transmissie!!!';
        }
    }

    // validation 10th field: price
    if (!$_POST['price']) {
        $errors[] = 'Vraagprijs is een verplicht veld!!!';
    } else {
        $price = $_POST['price'];
        if (preg_match('/[^0-9]/', $price)) {
            $errors[] = 'Ongeldige ingave: Vraagprijs!!!';
        } else if ($price < 1000) {
            $errors[] = 'Ongeldige ingave: Vraagprijs!!!';
        }
    }

    // validation 11th field: url
    if (!$_POST['fotoUrl']) {
        $errors[] = 'URL is een verplicht veld!!!';
    } else {
        $url = $_POST['fotoUrl'];
        if (is_int($url)) {
            $errors[] = 'Ongeldige selectie: URL!!!';
        } else if (!preg_match('/.*\.[JPEG|JPG|PNG|WEBP].*/', strtoupper($url))) {
            $errors[] = 'Ongeldige selectie: URL!!!';
        }
    }

    // If all fields are correctly filled
    if (count($errors) == 0) {
        $set = newSet();
        $user = 1; //hardcoded for now until loginsystem and session are in place to track actual user


        $newCar = addCar($make, $model, $year, $fuel, $colour, $doors, $transmission, $price, $mileage, $body, $url, $set, $user);

        header("Location: index.php?message=Auto toegevoegd");
        exit;
    }
}
