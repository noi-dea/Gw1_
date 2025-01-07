<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../functions.inc.php';

$userId = 1;

// if (isset($_POST['add']) && !empty($_POST['add'])) {
//     $carId = intval($_POST['add']);
//     addToWishlist($carId, $userId);
//     exit;
// }

if (isset($_POST['remove']) && !empty($_POST['remove'])) {
    $carId = intval($_POST['remove']);
    removeFromWishlist($carId, $userId);
}

$wishlist = getWishlist($userId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
</head>

<body>

    <h1>Mijn Wishlist</h1>

    <h2>Geselecteerde auto's:</h2>
    <form method="POST" action="wishlist.php">
        <?php if (count($wishlist) > 0): ?>
            <ul>
                <?php foreach ($wishlist as $item): ?>
                    <li>
                        <?= $item['makeName'] . ' ' . $item['model'] . ' - &euro;' . number_format($item['price'], 2) ?>
                        <img src="<?= $item['fotoUrl'] ?>" alt="Auto afbeelding" style="width:100px;height:auto;">
                        <button type="submit" name="remove" value="<?= $item['id'] ?>">Verwijderen</button>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Uw wishlist is leeg.</p>
        <?php endif; ?>
    </form>

</body>

</html>