<?php
session_start();
$homepath = '';
if (isset($_SERVER['admin']) || isset($pageInIncludes)) {
    $homepath = '../';
}
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
} else {
    $username = 'Get Started';
}
?>

<header>
    <nav class="nav-container">
        <a href="/" class="site-logo">Groeps Weirk.</a>
        <i class="icon-menu1"></i>
        <ul class="main-nav">
            <li><a href="<?= $homepath; ?>/index.php"><i class="icon-home"></i><span class="nav-text">Home</span></a></li>
            <li><a href="<?= $homepath; ?>includes/carlistpage.php"><i class="icon-travel-car"></i><span class="nav-text">Car Stock</span></a></li>
            <li><a href="<?= $homepath; ?>includes/contact.php"><i class="icon-mail"></i><span class="nav-text">Contact</span></a></li>
        </ul>
        <div class="dropdown">
            <button class="dropbtn">
                <i class="icon-user1"></i>
                <span class="nav-text"><?= $username; ?></span>
            </button>
            <div class="dropdown-content">
                <?php if (isset($_SESSION['adminbtn']) && $_SESSION['adminbtn'] == true): ?>
                    <a href="<?= $homepath; ?>/admin"><i class="icon-user"></i><span>Admin</span></a>
                <?php endif; ?>
                <?php if ($username !== 'Get Started') { ?>
                    <a href="<?= $homepath; ?>includes/wishlist.php"><i class="icon-heart2"></i><span>Wishlist</span></a>
                    <a href="<?= $homepath; ?>includes/logout.php"><i class="icon-log-out"></i><span>Log Out</span></a>
                <?php } else { ?>
                    <a href="<?= $homepath; ?>includes/login.php"><i class="icon-login"></i><span>Log In</span></a>
                    <a href="<?= $homepath; ?>includes/register.php"><i class="icon-clipboard"></i><span>Sign Up</span></a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <div class="mobile-menu">
        <button class="mobile-button"> </button>
        <div class="mobile-content hidden">
            <a href="<?= $homepath; ?>/index.php"><i class="icon-home"></i><span class="nav-text">Home</span></a>
            <a href="<?= $homepath; ?>includes/carlistpage.php"><i class="icon-travel-car"></i><span class="nav-text">Car Stock</span></a>
            <a href="<?= $homepath; ?>includes/contact.php"><i class="icon-mail"></i><span class="nav-text">Contact</span></a>
            <?php if (isset($_SESSION['adminbtn']) && $_SESSION['adminbtn'] == true): ?>
                <a href="<?= $homepath; ?>/admin"><i class="icon-user"></i><span>Admin</span>
            <?php endif; ?>
            <?php if ($username !== 'Get Started') { ?>
                <a href="<?= $homepath; ?>includes/wishlist.php"><i class="icon-heart2"></i><span>Wishlist</span>
                <a href="<?= $homepath; ?>includes/logout.php"><i class="icon-log-out"></i><span>Log Out</span>
            <?php } else { ?>
                <a href="<?= $homepath; ?>includes/login.php"><i class="icon-login"></i><span>Log In</span>
                <a href="<?= $homepath; ?>includes/register.php"><i class="icon-clipboard"></i><span>Sign Up</span>
            <?php } ?>
        </div>
    </div>
</header>
<script src="../js/index.js"></script>