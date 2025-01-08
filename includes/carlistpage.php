<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("../functions.inc.php");

session_start();

// echo '<pre>';
// Print_r($_SESSION);
// echo '</pre>';

if (isset($_SESSION['results']) && is_array($_SESSION['results'])) {
    $results = $_SESSION['results'];


    unset($_SESSION['results']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./dist/<?= $cssPath ?>" />
    <link rel="stylesheet" href="/css/style.css" />
    <script type="module" src="./dist/<?= $jsPath ?>"></script>
</head>

<body>
    <?php include 'hp_header.php'; ?>
    <table>
        <thead>
            <tr>
                <th>
                    Brand
                </th>
                <th>model</th>


                <th>prize</th>

                <th>picture</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if (!empty($results)) {
                // Door alle arrays in $results heen lopen
                foreach ($results as $result_set) {
                    // Als de set van auto's niet leeg is, doorloop dan de auto's
                    if (!empty($result_set)) {
                        foreach ($result_set as $car): ?>
                            <tr class='car'>
                                <td><?= getCarBrand($car["makes_id"]); ?></td>
                                <td><?= $car["model"]; ?></td>

                                <td>€<?= number_format($car["price"], 2, ',', '.'); ?> </td>

                                <td><a href="cardetailpage.php?id=<?= $car["id"]; ?>"><img src="<?= $car["fotoUrl"]; ?>" alt="<?= $car["model"]; ?>" width="100" height="auto"></a></td>
                            </tr>
            <?php endforeach;
                    }
                }
            }

            // Als er geen resultaten zijn
            if (empty($results[0]) && empty($results[1])) {
                echo "<tr><td colspan='7'>Geen resultaten gevonden.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <?php include 'hp_footer.php'; ?>
</body>

</html>