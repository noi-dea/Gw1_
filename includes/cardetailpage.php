<?php
// debugg lines
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../functions.inc.php');
$lastId = getIdLastCar();
echo $lastId;
exit;
if (isset($_GET['id'])){
    $id = $_GET['id'];
    if ($id < 1 || preg_match('/[\D]/', $id)){
        $id = 1;
    }
    if ($id > $lastId){
        $id = $lastId;
    }
}
$car = getCar($id);
echo '<pre>';
Print_r($test);
echo '</pre>';

?>
