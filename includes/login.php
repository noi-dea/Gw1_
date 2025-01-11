<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("../functions.inc.php");
requiredLoggedOut();
$errors = [];

// Debugging
if (isset($_GET["register"])) {
    header("Location: ./register.php");
    exit;
}

if (isset($_GET["login"])) {
    $username = trim($_GET["inputusername"]);
    $password = trim($_GET["inputpassword"]);

    // Controleer of gebruikersnaam en wachtwoord ingevuld zijn
    if (!strlen($username)) {
        $errors[] = "Please fill in username";
    }
    if (!strlen($password)) {
        $errors[] = "Please fill in password";
    }

    if (count($errors) < 1) {
        print "controle";
        $uid = isValidLogin($username, $password);


        if ($uid) {
            print "uid geprint";
            setLogin($uid);
            if (isAdmin($uid) == 1) {
                $_SESSION['adminbtn'] = true;
            }
            $_SESSION['user'] = $username;
            header("Location: ../index.php");
            exit;
        } else {
            $errors[] = "E-mail and/or password is not correct.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../dist/<?= $cssPath ?>" />
    <script type="module" src="../dist/<?= $jsPath ?>"></script>
</head>

<body>
    <?php include('hp_header.php'); ?>
    <section class="section_login_form">
        <?php if (count($errors) > 0): ?>
            <div class="div_login_errors">


                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif ?>
        <h1>Login</h1>
        <form method="get" action="login.php">

            <input name="inputusername" id="inputusername" type="text" placeholder="Enter your username">

            <input name="inputpassword" id="inputpassword" type="password" placeholder="Enter your password">


            <input type="submit" value="Login" name="login">
            <input type="submit" value="Register" name="register">

        </form>
    </section>
    <?php include 'hp_footer.php'; ?>
</body>

</html>