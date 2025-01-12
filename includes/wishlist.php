<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../functions.inc.php';
session_start();

$pageInIncludes = true;
$uid = $_SESSION["uid"];

$message = "";
$errors = "";



if (!isset($uid)) {

    header("Location: login.php");
    exit();
}


if (isset($_GET['remove']) && !empty($_GET['remove'])) {
    $removeCar = intval($_GET['remove']);
    $result = removeFromWishlist($removeCar, $uid);
    if ($result["success"]) {
        $message = "Item succesfully deleted from your wishlist!!!";
    } else {
        $errors = "Something went wrong!!!";
    }
}

if (isset($_GET["add"]) && !empty($_GET['add'])) {
    $addCar = intval($_GET["add"]);
    $result = addToWishlist($addCar, $uid);
    if ($result["success"]) {
        $message = "Item succesfully added to your wishlist";
    } else {
        $errors = "Something went wrong!!!";
    }
}

$wishlist = getWishlist($uid);


//todo
// //-----// pagination variables
$pagefile = "wishlist.php";
$firstpage = 1;
$pagelimit = 8;
$lastpage = ceil(count($wishlist) / $pagelimit);
include("./pagination.validation.php");

// //-----// car indexes
$firstIndex = 0 + (($pagenr - 1) * $pagelimit);
$lastIndex = $firstIndex + $pagelimit - 1;
if ($lastIndex > count($wishlist) - 1) {
    $lastIndex = count($wishlist) - 1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Wishlist </title>
    <link rel="stylesheet" href="../css/wishlist.css">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/icons.css" />
    <link rel="stylesheet" href="../css/pagination.css" />
    <link rel="stylesheet" href="../dist/<?= $cssPath ?>" />
    <script type="module" src="../dist/<?= $jsPath ?>"></script>
</head>

<body>
    <?php include('hp_header.php'); ?>
    <main>
        <h1>My Wishlist</h1>
        <?php if ($message): ?>
            <div class="class_message">
                <li><?= $message; ?></li>
            </div>
        <?php endif ?>
        <?php if ($errors): ?>
            <div class="class_errors">
                <li><?= $errors; ?></li>
            </div>
        <?php endif ?>

        <section class="section_class">
            <form method="GET" action="wishlist.php">
                <?php if (count($wishlist) > 0): ?>
                    <ul class="wishlist-grid">
                        <?php for ($i = $firstIndex; $i <= $lastIndex; $i++): ?>
                            <li class="wishlist-item">
                                <img src="<?= $wishlist[$i]['fotoUrl'] ?>" alt="Auto afbeelding">
                                <div class="item-details">
                                    <p><?= $wishlist[$i]['makeName'] . ' ' . $wishlist[$i]['model'] ?></p>
                                    <p>&euro; <?= number_format($wishlist[$i]['price'], 2) ?></p>
                                    <button type="submit" name="remove" value="<?= $wishlist[$i]['id'] ?>">Verwijderen</button>
                                </div>
                            </li>
                        <?php endfor; ?>
                    </ul>
                <?php else: ?>
                    <p class_empty>Your wishlist is empty.</p>
                <?php endif; ?>
            </form>
        </section>
    </main>

    <?php
    include('pagination.logic.php'); 
    include 'hp_footer.php'; 
    ?>
</body>

</html>