<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
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

session_start();
$username = isset($_SESSION['user']) ? $_SESSION['user'] : null;

?>
<script src="index.js"></script>
<section class="hero-bg">
    <section class="main-intro" id="main-intro">
        <p>Hi <?= !empty($username) ? $username : ''; ?>!</p>
        </p>
        <p>Looking for your dream car? We’ve got it!</p>
        <h1>- Get Yours Today!<br></h1>
        <div class="get-started-btn">
            <a href="#search-container">Get Started</a>
    </section>


    <section id="search-container" class="search-container">
        <div>
            <div>
                <form class="search-form" action="../index.php" method="GET">
                    <div class="filter-section">
                        <label for="price_min">Price:</label>
                        <input type="number" id="price_max" name="price_max" placeholder="Max(€): 200,000" min="0" max="200000">
                    </div>

                    <div class="filter-section">
                        <label for="makes_id">Brand:</label>
                        <select id="makes_id" name="makes_id">
                            <option value="">Select Brand</option>
                            <?php foreach ($makes as $make): ?>
                                <option value="<?= $make['id']; ?>"> <?= $make['makeName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="filter-section">
                        <label for="model">Model:</label>
                        <select id="model" name="model">
                            <option value="">Select Model</option>
                        </select>
                    </div>

                    <div class="filter-section">
                        <label for="fueltype">Fuel Type:</label>
                        <select id="fueltype" name="fueltype">
                            <option value="">Select Fuel type</option>
                            <option value="petrol">Petrol</option>
                            <option value="diesel">Diesel</option>
                            <option value="hybrid">Hybrid</option>
                            <option value="electric">Electric</option>
                        </select>
                    </div>

                    <div class="filter-section">
                        <label for="transmission">Transmission:</label>
                        <select id="transmission" name="transmission">
                            <option value="">Select Transmission</option>
                            <option value="manual">Manual</option>
                            <option value="automatic">Automatic</option>
                        </select>
                        </select>
                    </div>

                    <div class="filter-section">
                        <label for="colours_id">Color:</label>
                        <select id="colours_id" name="colours_id">
                            <option value="">Select Color</option>
                            <?php foreach ($colours as $colour): ?>
                                <option value="<?= $colour['id']; ?>"><?= $colour['colourName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="filter-section">
                        <label for="km_min">Mileage:</label>
                        <input type="number" id="km_max" name="km_max" placeholder="Max(km): 500,000" min="0" max="100,000">
                    </div>

                    <button type="submit"><i class="icon-search"></i> Search</button>
                </form>
            </div>
    </section>
</section>

<section>
    <div class="category-container">
        <?php include('hp_categorie.php'); ?>
</section>