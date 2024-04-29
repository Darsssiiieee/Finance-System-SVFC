<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Finally, destroy the session.
session_destroy();

// Redirect to the login page:
header('Location: ./../accounts/login.php');
