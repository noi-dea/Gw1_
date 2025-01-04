<?php

session_start();
unset($_SESSION['loggedin']);

header("Location: /includes/login.php");
exit;
