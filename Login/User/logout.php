<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the home page or wherever you want after logout
header("Location: ../../accueil.php");
exit();
