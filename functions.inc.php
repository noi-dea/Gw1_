
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
    $sql = "SELECT COUNT(*) AS total FROM users WHERE mail=:mail";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([
        ':mail' => $email
    ]);

    return (bool)$stmt->fetchColumn();
}


function userExists(String $email): bool
{
    $sql = "SELECT COUNT(*) AS total FROM users WHERE mail=:mail";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([
        ':mail' => $email
    ]);

    return (bool)$stmt->fetchColumn();
}
