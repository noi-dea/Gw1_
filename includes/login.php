<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("../functions.inc.php");
requiredLoggedOut();
$errors = [];

// Debugging


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

    // Alleen doorgaan als er geen fouten zijn
    echo '<pre>';
    print_r($errors);
    echo '</pre>';
    print "ok";
    if (count($errors) < 1) {
        print "controle";
        $uid = isValidLogin($username, $password);


        if ($uid) {
            print "uid geprint";
            setLogin($uid);
            if (isAdmin($uid) == 1){
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
    <title>Document</title>
</head>

<body>
    <?php if (count($errors) > 0): ?>

        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>

    <?php endif ?>
    <h1>login</h1>
    <form method="get" action="login.php">
        <div class="">
            <input name="inputusername" id="inputusername" type="text" placeholder="Enter your username">
        </div>
        <div class="">
            <input name="inputpassword" id="inputpassword" type="password" placeholder="Enter your password">
        </div>

        <input type="submit" value="login" name="login">
    </form>
</body>

</html>