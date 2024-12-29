
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
function isValidLogin(String $username, String $password): bool|int
{
    $sql = "SELECT id FROM users WHERE username=:username AND password=MD5(:password)";

    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':password' => $password
    ]);
    return $stmt->fetchColumn();
}

function searchFilterFunction($filters)
{
    $sql = "SELECT * FROM cars WHERE 1=1";
    $searchCriteria = [];
    $errors = [];

    // Prijs
    if (!empty($filters['price_max'])) {
        if (!is_numeric($filters['price_max'])) {
            $errors[] = "Maximum prijs moet een geldig getal zijn.";
        } elseif ($filters['price_max'] < 0 || $filters['price_max'] > 200000) {
            $errors[] = "Maximum prijs moet tussen 0 en 200000 liggen.";
        }
    }
    if (!empty($filters['price_max'])) {
        $sql = $sql . " AND price <= :price_max";
        $searchCriteria[':price_max'] = $filters['price_max'];
    }

    // Brand
    if (!empty($filters['makes_id'])) {
        $sql = $sql . " AND makes_id = :makes_id";
        $searchCriteria[':makes_id'] = $filters['makes_id'];
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
    if (!empty($filters['km_max'])) {
        if (!is_numeric($filters['km_max'])) {
            $errors[] = "Maximum kilometerstand moet een geldig getal zijn.";
        } elseif ($filters['km_max'] < 0 || $filters['km_max'] > 500000) {
            $errors[] = "Maximum kilometerstand moet tussen 0 en 500000 liggen.";
        }
    }
    if (!empty($filters['km_max'])) {
        $sql = $sql . " AND mileage <= :km_max";
        $searchCriteria[':km_max'] = $filters['km_max'];
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
        $sql = $sql . " AND colours_id = :colour";
        $searchCriteria[':colour'] = $filters['colour'];
    }

    $db = connectToDB();
    $stmt = $db->prepare($sql);
    $stmt->execute($searchCriteria);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return [$results, $errors];
}

// Insert a new car into the database
function addCar(INT $make, STRING $model, INT $year, STRING $fueltype, INT $colour, INT $doors, STRING $transmission, INT $price, INT $mileage, INT $body, STRING $url)
{
    $db = connectToDB();

    $sql = 'INSERT INTO cars (makes_id, model, year, fueltype, colours_id, doors, transmission, price, mileage, bodywork_id, fotoUrl)
    VALUES (:make, :model, :y, :fuel, :col, :doors, :trans, :price, :mil, :body, :foto);';
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':make' => $make,
        ':model' => $model,
        ':y' => $year,
        ':fuelt' => $fueltype,
        ':col' => $colour,
        ':doors' => $doors,
        ':trans' => $transmission,
        ':price' => $price,
        ':mil' => $mileage,
        ':body' => $body,
        ':foto' => $url
    ]);
}

// Get the colours currently stored in the database
function getColours()
{
    $db = connectToDB();

    $sql = 'SELECT * from colours';
    $stmt = $db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get the brands/makes currently stored in the database
function getMakes()
{
    $db = connectToDB();

    $sql = 'SELECT * from makes';
    $stmt = $db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get the bodyworks currently stored in the database
function getBodyworks()
{
    $db = connectToDB();

    $sql = 'SELECT * from bodyworks';
    $stmt = $db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
