
<?php
include('env.inc.php');
// echo '<pre>';
// Print_r($_ENV);
// echo '</pre>';
// exit;
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

function connectToDB()
{
    // CONNECTIE CREDENTIALS
    $db_host = $_ENV['DB_HOST'];
    $db_user = $_ENV['DB_USER'];
    $db_password = $_ENV['DB_PASS'];
    $db_db = $_ENV['DB_DB'];
    $db_port = $_ENV['DB_PORT'];

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

function searchFilterFunction($filters)
{
    $sql = "SELECT * FROM cars WHERE 1=1";
    $searchCriteria = [];

    // Prijs
    if (!empty($filters['price_min'])) {
        $sql = $sql . " AND price >= :price_min";
        $searchCriteria[':price_min'] = $filters['price_min'];
    }
    if (!empty($filters['price_max'])) {
        $sql = $sql . " AND price <= :price_max";
        $searchCriteria[':price_max'] = $filters['price_max'];
    }

    // Brand
    if (!empty($filters['brand'])) {
        $sql = $sql . " AND brand = :brand";
        $searchCriteria[':brand'] = $filters['brand'];
    }

    // Model
    if (!empty($filters['model'])) {
        $sql = $sql . " AND model = :model";
        $searchCriteria[':model'] = $filters['model'];
    }

    // Year
    if (!empty($filters['year'])) {
        $sql = $sql . " AND year = :year";
        $searchCriteria[':year'] = $filters['year'];
    }

    // Mileage
    if (!empty($filters['min_km'])) {
        $sql = $sql . " AND mileage >= :min_km";
        $searchCriteria[':min_km'] = $filters['min_km'];
    }
    if (!empty($filters['max_km'])) {
        $sql = $sql . " AND mileage <= :max_km";
        $searchCriteria[':max_km'] = $filters['max_km'];
    }

    // Fueltype
    if (!empty($filters['fueltype'])) {
        $sql = $sql . " AND fueltype = :fueltype";
        $searchCriteria[':fueltype'] = $filters['fueltype'];
    }

    // Transmission
    if (!empty($filters['transmission'])) {
        $sql = $sql . " AND transmission = :transmission";
        $searchCriteria[':transmission'] = $filters['transmission'];
    }

    // Color
    if (!empty($filters['colour'])) {
        $sql = $sql . " AND color = :colour";
        $searchCriteria[':colour'] = $filters['colour'];
    }

    $db = connectToDB();
    $stmt = $db->prepare($sql);
    $stmt->execute($searchCriteria);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}
