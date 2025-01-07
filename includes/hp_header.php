<?php
$homepath = '';
if (isset($_SERVER['admin']) || isset($pageInIncludes)) {
    $homepath = '../';
}
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
} else {
    $username = 'Meld je aan';
}
?>

<header class="header">
    <nav class="nav-container">
        <a href="/" class="site-logo">Groeps Weirk</a>

        <ul class="main-nav">
            <li><a href="/index.php">Home</a></li>
            <li><a href="includes/carlistpage.php">Car Stock</a></li>
            <li><a href="includes/contact.php">Contact</a></li>
        </ul>

        <div class="dropdown">
            <button class="dropbtn"><?= $username; ?></button>
            <div class="dropdown-content">
                <?php if (isset($_SESSION['adminbtn']) && $_SESSION['adminbtn'] == true): ?>
                    <a href="<?= $homepath; ?>/admin">Admin</a>
                <?php endif; ?>
                <?php if ($username !== 'Meld je aan') { ?>
                    <a href="<?= $homepath; ?>includes/wishlist.php">Wishlist</a>
                    <a href="<?= $homepath; ?>includes/logout.php">Log Out</a>
                <?php } else { ?>
                    <a href="<?= $homepath; ?>includes/login.php">Log In</a></li>
                    <a href="<?= $homepath; ?>includes/register.php">Sign Up</a></li>
                <?php } ?>
            </div>
        </div>
    </nav>
</header>