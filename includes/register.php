<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../functions.inc.php");

$errors = [];
$username = "";
$password1 = "";

$firstname = "";
$lastname = "";
$email = "";
$district = "";
$street = "";
$postal = 0;
$housenumber = 0;
$bus = "";
$isAdmin = 0;


if (isset($_POST["button"])) {
    if (!isset($_POST["inputusername"])) {
        $errors[] = "username is required";
    } else {
        $username = $_POST["inputusername"];
        if (userExists($username)) {
            $errors[] = "this user already regeister are you trying to login instead";
        }
    }

    //password
    if (!isset($_POST["inputpassword1"])) {
        $errors[] = "password1 is required";
    }
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

    //firstname
    // Validatie voor first name
    if (!isset($_POST['inputfirstname'])) {
        $errors[] = "Firstname is required.";
    } else {
        $firstname = $_POST['inputfirstname'];

        if (strlen($firstname) < 1) {
            $errors[] = "Firstname is required.";
        }

        if (preg_match("/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i", $firstname)) {
            $errors[] = "Firstname can not contain special characters";
        }
    }

    // Validatie voor last name
    if (!isset($_POST['inputlastname'])) {
        $errors[] = "Lastname is required.";
    } else {
        $lastname = $_POST['inputlastname'];

        if (strlen($lastname) < 1) {
            $errors[] = "Lastname is required.";
        }

        if (preg_match("/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i", $lastname)) {
            $errors[] = "Lastname can not contain special characters";
        }
    }

    // Validatie voor e-mail
    if (!isset($_POST['inputmail'])) {
        $errors[] = "E-mail address is invalid.";
    } else {
        $email = $_POST['inputmail'];
        //is het email adres syntax-gewijs valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "E-mail address is invalid.";
        } else {
            //syntax is valid maar is deze email uniek
            if (mailExists($email)) {
                $errors[] = "this email already regeister are you trying to login instead";
            }
        }
    }
    if (!isset($_POST["inputdistrict"])) {
        $errors[] = "district is required";
    } else {
        $district = $_POST["inputdistrict"];
    }

    if (!isset($_POST["inputstreet"])) {
        $errors[] = "street is required";
    } else {
        $street = $_POST["inputstreet"];
    }

    if (!isset($_POST["inputpostal"])) {
        $errors[] = "postal is required";
    } else {
        $postal = (int)$_POST["inputpostal"];
        echo var_dump($postal);
        if (!preg_match("/^(1000|[1-9][0-9]{3})$/", $postal)) {
            $errors[] = "postalcode must be between 1000 en 9999";
        }
    }

    if (!isset($_POST["inputstreet"])) {
        $errors[] = "street required";
    } else {
        $street = $_POST["inputstreet"];
    }
    if (!isset($_POST["inputhousenumber"])) {
        $errors[] = "housenumber required";
    } else {
        $housenumber = (int)$_POST["inputhousenumber"];
        if (!preg_match("/^\d+$/", $housenumber)) {
            $errors[] = "enkel cijfers";
        }
    }
    if (isset($_POST["bus"])) {
        $bus = $_POST["bus"];
    } else {
        $bus = "";
    }


    print $username;
    if (!count($errors)) {
        $newId = insertNewUser($username, $password1, $firstname, $lastname, $email, $district, $street, $postal, $housenumber, $bus);
        if (!$newId) {
            $errors[] = "An unknown error has occured, pleace contact us...";
        } else {

            header("Location: login.php");
            exit;
        }
    }
}




?>


<?php if (count($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="register.php">
    <div>
        <input name="inputusername" id="inputusername" type="text" placeholder="Username" value="<?= $username ? $username : "" ?>">
    </div>
    <div>
        <input name="inputpassword1" id="inputpassword1" type="text" placeholder="Password">
    </div>
    <div>
        <input name="inputpassword2" id="inputpassword2" type="text" placeholder="Repeat Password">
    </div>
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
        <input name="inputdistrict" id="inputdistrict" type="text" placeholder="Enter your distric" value="<?= $district ? $district : "" ?>">
    </div>
    <div>
        <input name="inputstreet" id="inputstreet" type="text" placeholder="Enter your street" value="<?= $street ? $street : "" ?>">
    </div>
    <div>
        <input name="inputpostal" id="inputpostal" type="" placeholder="Enter your postalcode" value="<?= $postal ? $postal : "" ?>">
    </div>
    <div>
        <input name="inputhousenumber" id="inputhousenumber" type="text" placeholder="Enter your housenumber" value="<?= $housenumber ? $housenumber : "" ?>">
    </div>
    <div>
        <input name="inputbus" id="inputbus" type="text" placeholder="Enter your bus" value="<?= $bus ? $bus : "" ?>">
    </div>




    <button value="test" name="button">Sign up</button>
</form>