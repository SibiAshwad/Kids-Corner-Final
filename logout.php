<?php
//starting the session
require("connection.php");

//maintaning of the session
unset($_SESSION['user']);

// Otherwise, we unset all of the session variables.
$_SESSION = array();

// If it needs to destroy, also delete the session cookie
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destruction of the session.
session_destroy();

// Whether we destroy the session or not, we redirect them to the login page
header("Location: login.php");
die("Redirecting to: login.php");
?>