
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
function isAdmin($id)
{
    $sql = "SELECT IsAdmin from users WHERE id=:id";
    $stmt = connectToDB()->prepare($sql);
    $stmt->execute([
        ':id' => $id,

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
            $errors[] = "Price must be a valid number.";
        } elseif ($filters['price_max'] < 0 || $filters['price_max'] > 200000) {
            $errors[] = "Select a price between 0 and 200,000.";
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
            $errors[] = "Mileage must be a valid number.";
        } elseif ($filters['km_max'] < 0 || $filters['km_max'] > 500000) {
            $errors[] = "Mileage must be between 0 and 500,000.";
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


//alle modellen ophalen. 
function getAllModels()
{
    $db = connectToDB();
    $sql = "SELECT DISTINCT model FROM cars";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// models adhv brand
function getModelsByMake($make_id = null)
{
    $db = connectToDB();

    if ($make_id) {
        $sql = "SELECT model FROM cars WHERE makes_id = :make_id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':make_id' => $make_id]);
    } else {
        $sql = "SELECT DISTINCT model FROM cars";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// Insert a new car into the database
function addCar(INT $make, STRING $model, INT $year, STRING $fueltype, INT $colour, INT $doors, STRING $transmission, INT $price, INT $mileage, INT $body, STRING $url, INT $fid, INT $sid)
{
    $db = connectToDB();

    $sql = 'INSERT INTO cars (makes_id, model, year, fueltype, colours_id, doors, transmission, price, mileage, bodywork_id, fotoUrl, fotosets_id, users_id)
    VALUES (:make, :model, :y, :fuelt, :col, :doors, :trans, :price, :mil, :body, :foto, :ftID, :usID);';
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
        ':foto' => $url,
        ':ftID' => $fid,
        ':usID' => $sid
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

//WISHLIST Add car:
function addToWishlist($carId, $userId)
{
    try {
        $db = connectToDB();
        $sql = "INSERT INTO wishlist (cars_id, users_id) VALUES (:cars_id, :users_id)";
        $stmt = $db->prepare($sql);
        $success = $stmt->execute([
            ':cars_id' => $carId,
            ':users_id' => $userId
        ]);
        if ($success) {
            return ['success' => true, 'message' => 'Auto succesvol toegevoegd aan de wishlist!'];
        } else {
            return ['success' => false, 'message' => 'Kon niet toevoegen aan de wishlist.'];
        }
    } catch (PDOException $e) {
        // Vang fouten op en retourneer een duidelijke melding
        return ['success' => false, 'message' => 'Databasefout: ' . $e->getMessage()];
    }
}

// WISHLIST Remove cars
function removeFromWishlist($carId, $userId)

{
    try {
        $db = connectToDB();
        $sql = "DELETE FROM wishlist WHERE cars_id = :cars_id AND users_id = :users_id";
        $stmt = $db->prepare($sql);
        $success = $stmt->execute([
            ':cars_id' => $carId,
            ':users_id' => $userId
        ]);
        if ($success) {
            return ['success' => true, 'message' => 'Auto succesvol toegevoegd aan de wishlist!'];
        } else {
            return ['success' => false, 'message' => 'Kon niet toevoegen aan de wishlist.'];
        }
    } catch (PDOException $e) {
        // Vang fouten op en retourneer een duidelijke melding
        return ['success' => false, 'message' => 'Databasefout: ' . $e->getMessage()];
    }
}


// WISHLIST Get alle cars
function getWishlist($userId)
{
    $db = connectToDB();
    $sql = "SELECT cars.id, cars.model, cars.price, cars.fotoUrl, makes.makeName AS makeName
    FROM cars
    JOIN makes ON cars.makes_id = makes.id
    JOIN wishlist ON cars.id = wishlist.cars_id
    WHERE wishlist.users_id = :users_id";

    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':users_id' => $userId
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get id of last fotoset
function getLastSet()
{
    $db = connectToDB();

    $sql = 'SELECT id FROM fotosets ORDER BY id DESC LIMIT 1;';
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $output = $stmt->fetch(PDO::FETCH_ASSOC);
    return $output['id'];
}

// create new fotoset and get its id (for creation new entry car)
function newSet()
{
    // get the current highest index
    $highest = getLastSet();
    // increase it to get the first unused index
    $highest++;

    $db = connectToDB();

    $sql = 'INSERT INTO fotosets (id) VALUES (:id);';
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':id' => $highest
    ]);
    return $highest;
}

// Get a car with specific id from database
function getCar(INT $id)
{
    $db = connectToDB();

    $sql = 'SELECT makeName as make, model, year, fueltype, colourName as colour, doors, transmission, price, mileage, typeName as body, fotoUrl as ul, fotosets.* FROM cars
    LEFT JOIN makes on makes.id = makes_id
    LEFT JOIN colours on colours.id = colours_id
    LEFT JOIN bodyworks on bodyworks.id = bodywork_id
    LEFT JOIN fotosets on fotosets.id = fotosets_id
    WHERE cars.id = :id;';
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Get all cars of admin with id
function getAdminCars(INT $id)
{
    $db = connectToDB();

    $sql = "SELECT cars.id, makes.makeName as make, cars.model, cars.year, cars.fueltype, colours.colourName as colour, cars.doors, cars.transmission, cars.price, cars.mileage, bodyworks.typeName as bodywork, fotoUrl 
    FROM cars
    LEFT JOIN makes on makes.id = makes_id
    LEFT JOIN colours on colours.id = colours_id
    LEFT JOIN bodyworks on bodyworks.id = bodywork_id
    WHERE users_id = :id;";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':id' => $id,
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCarBrand(INT $id)
{ //function to get brand name in carlistpage
    $db = connectToDB();
    $sql = "SELECT makeName from makes where id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':id' => $id,
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result["makeName"] : "";
}

// niet meer nodig 
// function getColor(INT $id)
// { //function to get colour in carlistpage
//     $db = connectToDB();
//     $sql = "SELECT colourName from colours where id = :id";
//     $stmt = $db->prepare($sql);
//     $stmt->execute([
//         ':id' => $id,
//     ]);
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);
//     return $result ? $result["colourName"] : "";
// }

// function getbodywork(INT $id)
// { //function to get colour in carlistpage
//     $db = connectToDB();
//     $sql = "SELECT typeName from bodyworks where id = :id";
//     $stmt = $db->prepare($sql);
//     $stmt->execute([
//         ':id' => $id,
//     ]);
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);
//     return $result ? $result["typeName"] : "";
// }



// Get the id of the last car
function getIdLastCar()
{

    $db = connectToDB();

    $sql = 'SELECT cars.id FROM cars ORDER BY id DESC;';
    $stmt = $db->prepare($sql);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_NUM)[0]; //only want the value, not the single value array fetch creates
}


//SESSIONS LOGIN
function requiredLoggedIn()
{
    if (!isLoggedIn()) {
        header("Location: includes\login.php");
        exit;
    }
}

function requiredLoggedOut()
{
    if (isLoggedIn()) {
        header("Location: ../index.php");
        exit;
    }
}

function isLoggedIn(): bool
{
    session_start();

    $loggedin = FALSE;

    if (isset($_SESSION['loggedin'])) {
        if ($_SESSION['loggedin'] > time()) {
            $loggedin = TRUE;
            setLogin();
        }
    }

    return $loggedin;
}

function setLogin($uid = false)
{
    $_SESSION['loggedin'] = time() + 3600;

    if ($uid) {
        $_SESSION['uid'] = $uid;
    }
}

// remove car from database
function removeCar(INT $id): void
{
    $db = connectToDB();

    $sql = "DELETE FROM cars WHERE cars.id = :id;";
    $stmt = $db->prepare($sql);
    $stmt->execute([':id' => $id]);
}
function updateCar($id, $fotoUrl,  $fotoUrlFront,  $fotoUrlBack, $fotoUrlInner, $prize, $mileage)
{

    $db = connectToDB();

    $sqlCars = "UPDATE cars 
                SET price = :prize, mileage = :mileage, fotoUrl = :fotoUrl 
                WHERE id = :id";
    $stmtCars = $db->prepare($sqlCars);
    $stmtCars->execute([
        ':id' => $id,
        ':fotoUrl' => $fotoUrl,
        ':prize' => $prize,
        ':mileage' => $mileage
    ]);


    $sqlFotosets = "UPDATE fotosets 
                    SET front = :fotoUrlFront, back = :fotoUrlBack, `inner` = :fotoUrlInner 
                    WHERE id = :id";
    $stmtFotosets = $db->prepare($sqlFotosets);
    $stmtFotosets->execute([
        ':id' => $id,
        ':fotoUrlFront' => $fotoUrlFront,
        ':fotoUrlBack' => $fotoUrlBack,
        ':fotoUrlInner' => $fotoUrlInner
    ]);
    return $stmtCars->rowCount() > 0 || $stmtFotosets->rowCount() > 0;
}

// Get all cars from database
function getAllCars()
{
    $db = connectToDB();

    $sql = 'SELECT cars.id as id, makeName as make, model, fotoURL, year FROM cars
    LEFT JOIN makes on makes.id = makes_id;';

    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function allCars()
{
    $db = connectToDB();
    $sql = "SELECT * FROM cars";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
