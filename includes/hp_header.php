<?php
$adminpath = 'admin';
if (isset($_SERVER['admin'])) {
    $adminpath = "index.php";
}
?>

<header class="header">
    <nav class="nav-container">
        <a href="/" class="site-logo">Groeps Weirk</a>

        <ul class="main-nav">
            <li><a href="/index.php">Home</a></li>
            <li><a href="includes/carlistpage.php">Car Stock</a></li>
            <li><a href="/contact.php">Contact</a></li>
        </ul>

        <ul class="user-nav">
            <li><a href="includes/login.php" class="login-btn">Login</a></li>
            <li><a href="includes/register.php" class="register-btn">Sign Up</a></li>
            <li><a href="includes/logout.php" class="logout-btn">Logout</a></li>
            <li><a href="includes/wishlist.php" class="wishlist-link">Wishlist</a></li>
            <li><a href="<?= $adminpath; ?>" class="admin-btn"><i></i>Admin</a></li>
        </ul>
    </nav>
</header>