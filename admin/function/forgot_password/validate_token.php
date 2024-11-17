<?php
require '../../db.php';

// Check if token is provided
if (!isset($_GET['token'])) {
    $_SESSION['reset_message'] = "Invalid request.";
    header("Location: ../../../forgot_password.php");
    exit;
}

$token = $_GET['token'];

// Fetch the user with the given token and check expiration
$stmt = $conn->prepare("SELECT id, expires_at FROM users WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['reset_message'] = "Invalid or expired link.";
    header("Location: reset_form.php?token=$token");
    exit;
}

$user = $result->fetch_assoc();
$expiresAt = $user['expires_at'];

// Check if the link has expired
if (new DateTime() > new DateTime($expiresAt)) {
    $_SESSION['reset_message'] = "The reset link has expired.";
    header("Location: reset_form.php?token=$token");
    exit;
}

// If everything is okay, store user data and token in the session
$_SESSION['user_id'] = $user['id'];
