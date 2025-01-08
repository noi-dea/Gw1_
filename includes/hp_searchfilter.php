<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// session_start();
require 'functions.inc.php';
//verwijzing naar bovenstaande map weggehaald doordat deze problemen gaf op de index.php
//de searchfilter geeft dan zelf problemen op de localhost pagina, maar deze pagina hoort toch niet
//beschikt te worden
$makes = getMakes();
$colours = getColours();
$bodies = getBodyworks();

$filters = [
    'price_min' => isset($_GET['price_min']) ? $_GET['price_min'] : '',
    'price_max' => isset($_GET['price_max']) ? $_GET['price_max'] : '',
    'makes_id' => isset($_GET['makes_id']) ? $_GET['makes_id'] : '',
    'model' => isset($_GET['model']) ? $_GET['model'] : '',
    'fueltype' => isset($_GET['fueltype']) ? $_GET['fueltype'] : '',
    'transmission' => isset($_GET['transmission']) ? $_GET['transmission'] : '',
    'colour' => isset($_GET['colours_id']) ? $_GET['colours_id'] : '',
    'km_min' => isset($_GET['km_min']) ? $_GET['km_min'] : '',
    'km_max' => isset($_GET['km_max']) ? $_GET['km_max'] : ''
];
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (empty(array_filter($filters))) {
        $errors[] = "Vul minstens één zoekcriterium in";
    }
    if (empty($errors)) {
        $results = searchFilterFunction($filters);
        if (count($results) > 0) {
            $_SESSION["results"] = $results;
            echo '<pre>';
            Print_r($results);
            echo '</pre>';
            header("Location: includes/carlistpage.php");
            // ../ vervangen door includes/ doordat er vanuit de index geredirect wordt
            exit;
        } else {
            $message = "Géén auto's gevonden die aan je criteria voldoen";
        }
    }
}
?>
<div class="bg-image">
    <form class="search-form" action="../index.php" method="GET">
        <div class="filter-section">
            <label for="price_min">Prijs:</label>
            <input type="number" id="price_max" name="price_max" placeholder="Max €200000" min="0" max="200000">
        </div>

        <div class="filter-section">
            <label for="makes_id">Merk:</label>
            <select id="makes_id" name="makes_id">
                <option value="">Selecteer Merk</option>
                <?php foreach ($makes as $make): ?>
                    <option value="<?= $make['id']; ?>"> <?= $make['makeName']; ?></option>
                <?php endforeach; ?>
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
            <label for="colours_id">Kleur:</label>
            <select id="colours_id" name="colours_id">
                <option value="">Selecteer Kleur</option>
                <?php foreach ($colours as $colour): ?>
                    <option value="<?= $colour['id']; ?>"><?= $colour['colourName']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="filter-section">
            <label for="km_min">Kilometer:</label>
            <input type="number" id="km_max" name="km_max" placeholder="Max 500000km" min="0" max="100000">
        </div>

        <button type="submit"><i class="icon-search"></i> Zoek</button>
    </form>
</div>