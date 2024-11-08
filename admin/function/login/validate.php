<?php

session_start();
include 'admin/db.php';

$error_message = "";

if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0; // Initialize attempts counter
}

if (!isset($_SESSION['lockout_time'])) {
    $_SESSION['lockout_time'] = 0; // Initialize lockout time
}

// Check if user is locked out and if lockout period has expired
if ($_SESSION['attempts'] >= 3) {
    $remaining_lockout = 30 - (time() - $_SESSION['lockout_time']);
    if ($remaining_lockout > 0) {
        // $error_message = "Try again in $remaining_lockout seconds.";
    } else {
        // Reset attempts after lockout period expires
        $_SESSION['attempts'] = 0;
        $_SESSION['lockout_time'] = 0;
    }
}

// Proceeds to login if there's no incorrect input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Prevent SQL injection
    $inputUsername = $conn->real_escape_string($inputUsername);
    $inputPassword = $conn->real_escape_string($inputPassword);

    // Fetch user details from database
    $sql = "SELECT * FROM users WHERE username = '$inputUsername' AND password = '$inputPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Start session and set session variables
        // session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['loggedin'] = true;

        // Reset login attempts on successful login
        $_SESSION['attempts'] = 0;
        $_SESSION['lockout_time'] = 0;

        header("Location: admin/dashboard.php");
        exit;
    } else {
        $_SESSION['attempts'] += 1;
        if ($_SESSION['attempts'] >= 3) {
            $_SESSION['lockout_time'] = time();
        } else {
            $error_message = "Invalid username or password.";
        }
    }
}

$conn->close();
?>
