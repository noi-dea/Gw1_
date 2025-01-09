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

<header>
    <nav class="nav-container">
        <a href="/" class="site-logo">Groeps Weirk</a>
        <i class="icon-menu1"></i>
        <ul class="main-nav">
            <li><a href="/index.php"><i class="icon-home"></i> Home</a></li>
            <li><a href="includes/carlistpage.php"><i class="icon-travel-car "></i> Car Stock</a></li>
            <li><a href="includes/contact.php"> <i class="icon-mail"></i> Contact</a></li>
        </ul>
        <div class="dropdown">
            <button class="dropbtn"><i class="icon-user1"></i><?= " " . $username; ?></button>
            <div class="dropdown-content">
                <?php if (isset($_SESSION['adminbtn']) && $_SESSION['adminbtn'] == true): ?>
                    <a href="<?= $homepath; ?>/admin"><i class="icon-user"></i> Admin</a>
                <?php endif; ?>
                <?php if ($username !== 'Meld je aan') { ?>
                    <a href="<?= $homepath; ?>includes/wishlist.php"><i class="icon-heart2"></i> Wishlist</a>
                    <a href="<?= $homepath; ?>includes/logout.php"><i class="icon-log-out"></i> Log Out</a>
                <?php } else { ?>
                    <a href="<?= $homepath; ?>includes/login.php"><i class="icon-login"></i> Log In</a></li>
                    <a href="<?= $homepath; ?>includes/register.php"><i class="icon-clipboard"></i> Sign Up</a></li>
                <?php } ?>
            </div>
        </div>
    </nav>
</header>