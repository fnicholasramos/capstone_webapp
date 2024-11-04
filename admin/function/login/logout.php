<?php
session_start();

// Check if the logout request is coming via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: /capstone");
    exit;
} else {
    // Redirect to login page if accessed directly (optional)
    header("Location: /capstone");
    exit;
}
?>
