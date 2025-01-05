<?php

session_start();
session_unset();

header("Location: /includes/login.php");
exit;
