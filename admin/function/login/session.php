<?php
session_start();

// Idle timeout duration (in seconds)
$timeoutDuration = 600;

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: /capstone");
    exit;
}

// Check if last activity timestamp is set
if (isset($_SESSION['last_activity'])) {
    // Calculate the session's lifetime
    $elapsedTime = time() - $_SESSION['last_activity'];
    
    if ($elapsedTime > $timeoutDuration) {
        // Destroy the session and redirect to login page if timeout is reached
        
        session_unset();
        session_destroy();
        
        header("Location: /capstone");
        echo "<div class='prompt'>TEST</div>";
        exit;
    }
}

// Update last activity timestamp
$_SESSION['last_activity'] = time();
?>
