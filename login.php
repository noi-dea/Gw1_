<?php

require("functions.inc.php");

$errors = [];

if (isset($_POST["button"])) {
    if (!strlen($_POST["inputusername"])) {
        $errors[] = "Please fill in username";
    }
    if (!strlen($_POST["inputpassword"])) {
        $errors[] = "Please fill in password";
    }
    $uid = isValidLogin($_POST["inputusername"], $_POST["inputpassword"]);
    if ($uid) {
        header("Location: ");
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
    <h1>login</h1>
</body>

</html>