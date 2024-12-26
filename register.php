<?php
require("functions.inc.php");

$errors = [];
$username = "";
$password1 = "";
$password2 = "";
$firstname = "";
$lastname = "";
$email = "";
$district = "";
$street = "";
$postalcode = "";
$housenumber = "";
$isAdmin = 0;


if (isset($_POST["button"])) {
    if (!isset($_POST["inputusername"])) {
        $errors[] = "username is required";
    } else {
        $username = $_POST["inputusername"];
    }

    //password
    if (!isset($_POST["inputpassword1"])) {
        $errors[] = "password1 is required";

        if (!isset($_POST["inputpassword2"])) {
            $errors[] = "password2 is required";
        } else {
            if ($_POST["inputpassword1"] !== $_POST["inputpassword2"]) {
                $errors[] = "password dont match";
            } else {
                $password1 = $_POST["inputpassword1"];
            }
            if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password1)) {
                $errors[] = "Password needs to contain at least 1 uppercase letter, 1 lowercase, 1 symbol, 1 number and needs to be at least 8 characters long.";
            }
        }
    }
    //firstname
}




?>


<form method="post" action="register.php">
    <div>
        <input name="inputfirstname" id="inputfirstname" type="text" placeholder="Firstname" value="<?= $firstname ? $firstname : "" ?>">
    </div>
    <div>
        <input name="inputlastname" id="inputlastname" type="text" placeholder="Lastname" value="<?= $lastname ? $lastname : "" ?>">
    </div>

    <div>
        <input name="inputmail" id="inputmail" type="text" placeholder="Enter your email" value="<?= $email ? $email : "" ?>">
    </div>
    <div>
        <input name="inputpass" id="inputpass" type="password" placeholder="Password">
    </div>



    <button value="test" name="button">Sign up</button>
</form>