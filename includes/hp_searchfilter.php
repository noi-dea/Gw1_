<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './functions.inc.php';

$filters = [
    'price_min' => isset($_GET['price_min']) ? $_GET['price_min'] : '',
    'price_max' => isset($_GET['price_max']) ? $_GET['price_max'] : '',
    'brand' => isset($_GET['brand']) ? $_GET['brand'] : '',
    'model' => isset($_GET['model']) ? $_GET['model'] : '',
    'fueltype' => isset($_GET['fueltype']) ? $_GET['fueltype'] : '',
    'transmission' => isset($_GET['transmission']) ? $_GET['transmission'] : '',
    'color' => isset($_GET['color']) ? $_GET['color'] : '',
    'km_min' => isset($_GET['km_min']) ? $_GET['km_min'] : '',
    'km_max' => isset($_GET['km_max']) ? $_GET['km_max'] : ''
];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($filters)) {
    $results = searchFilterFunction($filters);

    if (count($results) > 0) {
        header("Location: ../carlist.php");
        exit;
    } else {
        $message = "GEEN RESULTAAT GEVONDEN";
    }
}
?>

<form class="search-form" action="../index.php" method="GET">
    <div class="filter-section">
        <label for="price_min">Prijs:</label>
        <input type="number" id="price_min" name="price_min" placeholder="Min" min="0" max="100000">
        <input type="number" id="price_max" name="price_max" placeholder="Max" min="0" max="100000">
    </div>

    <div class="filter-section">
        <label for="brand">Merk:</label>
        <select id="brand" name="brand">
            <option value="">Selecteer Merk</option>
            <option value="BMW">BMW</option>
            <option value="Audi">Audi</option>
            <option value="Volkswagen">Volkswagen</option>
        </select>
    </div>

    <div class="filter-section">
        <label for="model">Model:</label>
        <select id="model" name="model">
            <option value="">Selecteer Model</option>
        </select>
    </div>

    <div class="filter-section">
        <label for="fueltype">Brandstof:</label>
        <select id="fueltype" name="fueltype">
            <option value="">Selecteer Brandstof</option>
            <option value="benzine">Benzine</option>
            <option value="diesel">Diesel</option>
            <option value="hybride">Hybride</option>
            <option value="elektrisch">Elektrisch</option>
        </select>
    </div>

    <div class="filter-section">
        <label for="transmission">Transmissie:</label>
        <select id="transmission" name="transmission">
            <option value="">Selecteer Transmissie</option>
            <option value="handmatig">Handmatig</option>
            <option value="automatisch">Automatisch</option>
        </select>
    </div>

    <div class="filter-section">
        <label for="color">Kleur:</label>
        <select id="color" name="color">
            <option value="">Selecteer Kleur</option>
            <option value="wit">Wit</option>
            <option value="zwart">Zwart</option>
            <option value="grijs">Grijs</option>
            <option value="blauw">Blauw</option>
            <option value="rood">Rood</option>
            <option value="groen">Groen</option>
            <option value="geel">Geel</option>
            <option value="bruin">Bruin</option>
        </select>
    </div>

    <div class="filter-section">
        <label for="km_min">Kilometer:</label>
        <input type="number" id="km_min" name="km_min" placeholder="Min 0" min="0" max="100000">
        <input type="number" id="km_max" name="km_max" placeholder="Max 100.000" min="0" max="100000">
    </div>

    <button type="submit">Zoek</button>
</form>