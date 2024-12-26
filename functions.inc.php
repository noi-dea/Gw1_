
<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

function connectToDB()
{
    // CONNECTIE CREDENTIALS
    $db_host = '127.0.0.1';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'mydb';
    $db_port = 8889;

    try {
        $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        die();
    }
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    return $db;
}

function mailExists(String $email): bool
{
    $sql = "SELECT COUNT(*) AS total FROM users WHERE email=:email";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([
        ':email' => $email
    ]);

    return (bool)$stmt->fetchColumn();
}


function userExists(String $user): bool
{
    $sql = "SELECT COUNT(*) AS total FROM users WHERE username=:user";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([
        ':user' => $user
    ]);

    return (bool)$stmt->fetchColumn();
}
function insertNewUser(String $username, String $password, String $firstname, String $lastname, String $email, String $district, String $street, int $postalcode, int $housenumber, String $bus): bool|int
{
    $db = connectToDB();
    $sql = "INSERT INTO users(username, password , firstname, lastname, email, district, street, postalcode,housenumber, bus) VALUES (:username, :password, :firstname, :lastname, :email, :district, :street, :postalcode, :housenumber, :bus)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':password' => md5($password),
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':email' => $email,
        ':district' => $district,
        ':street' => $street,
        ':postalcode' => $postalcode,
        ':housenumber' => $housenumber,
        ':bus' => $bus,
    ]);
    return $db->lastInsertId();
}
