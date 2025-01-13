<?php
$username = isset($_SESSION['user']) ? $_SESSION['user'] : null;

require 'functions.inc.php';

$makes = getMakes();
$colours = getColours();
$bodies = getBodyworks();
$selectedMake = isset($_GET['makes_id']) ? $_GET['makes_id'] : '';
$selectedModel = isset($_GET['model']) ? $_GET['model'] : '';
$models = !empty($selectedMake) ? getModelsByMake($selectedMake) : getAllModels();

$filters = [
    'price_max' => isset($_GET['price_max']) ? $_GET['price_max'] : '',
    'makes_id' => $selectedMake,
    'model' => $selectedModel,
    'fueltype' => isset($_GET['fueltype']) ? $_GET['fueltype'] : '',
    'transmission' => isset($_GET['transmission']) ? $_GET['transmission'] : '',
    'colour' => isset($_GET['colour']) ? $_GET['colour'] : '',
    'km_max' => isset($_GET['km_max']) ? $_GET['km_max'] : ''
];

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($filters['price_max']) || !empty($filters['km_max'])) {
    if (!empty($filters['price_max']) && ($filters['price_max'] < 0 || $filters['price_max'] > 200000)) {
        $errors[] = "<p class='error'>Price must be between 0 and 200,000.</p>";
    }

    if (!empty($filters['km_max']) && ($filters['km_max'] < 0 || $filters['km_max'] > 100000)) {
        $errors[] = "<p class='error'>Mileage must be between 0 and 500,000 km.</p>";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error;
        }
    } else {
        $results = searchFilterFunction($filters);
        if (count($results) > 0) {
            $_SESSION["results"] = $results;
            header("Location: includes/carlistpage.php");
            exit;
        } else {
            echo "<p class='message'>No cars found for the selected filters.</p>";
        }
    }
}

if (isset($message)) {
    echo "<p>$message</p>";
}


?>
<script src="index.js"></script>
<section class="hero-bg">
    <div id="trigger"></div>
    <section class="main-intro" id="main-intro">
        <p>Good to see you <?= !empty($username) ? $username : ''; ?>!</p>
        </p>
        <p>Looking for your dream car? We’ve got it!</p>
        <h1>- Get Yours Today!<br></h1>
        <div class="get-started-btn">
            <a href="#trigger">Search Now</a>
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
                                <option value="<?= $make['id']; ?>" <?= ($make['id'] == $selectedMake) ? 'selected' : ''; ?>> <?= $make['makeName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="filter-section">
                        <label for="model">Model:</label>
                        <select id="model" name="model">
                            <option value="">Select Model</option>
                            <?php
                            if (!empty($selectedMake)) {
                                $models = getModelsByMake($selectedMake);
                            } else {
                                $models = getAllModels();
                            }
                            foreach ($models as $model): ?>
                                <option value="<?= $model['model']; ?>" <?= ($model['model'] == $selectedModel) ? 'selected' : ''; ?>>
                                    <?= $model['model']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="filter-section">
                        <label for="fueltype">Fuel Type:</label>
                        <select id="fueltype" name="fueltype">
                            <option value="">Select Fuel type</option>
                            <option value="benzine" <?= ($filters['fueltype'] == 'petrol') ? 'selected' : ''; ?>>Petrol</option>
                            <option value="diesel" <?= ($filters['fueltype'] == 'diesel') ? 'selected' : ''; ?>>Diesel</option>
                            <option value="hybride" <?= ($filters['fueltype'] == 'hybrid') ? 'selected' : ''; ?>>Hybrid</option>
                            <option value="elektrisch" <?= ($filters['fueltype'] == 'electric') ? 'selected' : ''; ?>>Electric</option>
                        </select>
                    </div>

                    <div class="filter-section">
                        <label for="transmission">Transmission:</label>
                        <select id="transmission" name="transmission">
                            <option value="">Select Transmission</option>
                            <option value="handmatig" <?= ($filters['transmission'] == 'manueel') ? 'selected' : ''; ?>>Manual</option>
                            <option value="automatisch" <?= ($filters['transmission'] == 'automatisch') ? 'selected' : ''; ?>>Automatic</option>
                            <option value="electric" <?= ($filters['transmission'] == 'electrisch') ? 'selected' : ''; ?>>Electric</option>

                        </select>
                    </div>

                    <div class="filter-section">
                        <label for="colours_id">Color:</label>
                        <select id="colours" name="colour">
                            <option value="">Select Color</option>
                            <?php foreach ($colours as $colour): ?>
                                <option value="<?= $colour['id']; ?>" <?= ($colour['id'] == $filters['colour']) ? 'selected' : ''; ?>>
                                    <?= $colour['colourName']; ?>
                                </option>
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
    <div class="features-container">
        <?php include('features.php'); ?>
    </div>
</section>

<section>
    <div class="category-container">
        <?php include('hp_categorie.php'); ?>
    </div>
</section>