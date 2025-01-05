<?php

if (isset($_GET['id'])){
    $remove = $_GET['id'];
    removeCar($remove);
    header("Location: index.php?message=Auto verwijderd");
    exit;
} 
header("Location: index.php?message=Ongeldig verzoek");
exit;


?>