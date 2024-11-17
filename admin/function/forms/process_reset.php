<?php
require '../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm'];

    // Check if passwords match
    if ($newPassword !== $confirmPassword) {
        echo "Passwords do not match. Please try again.";
        exit;
    }

    // Validate token
    $stmt = $conn->prepare("SELECT id FROM users WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<p style='background-color: #f7d7da;
                    color: #731d25;
                    padding: 15px;
                    font-family: Arial;
                    border: hidden;
                    border-radius: 8px;
                    margin-left: auto;
                    margin-right: auto;
                    width: fit-content;'>
        
                    Invalid link or expired token.</p>";
        exit;
    }

    $user = $result->fetch_assoc();
    $userId = $user['id'];

    // Update the password
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("UPDATE users SET password = ?, token = NULL, expires_at = NULL WHERE id = ?");
    $stmt->bind_param("si", $hashedPassword, $userId);
    $stmt->execute();

    echo "<p style='background-color: #d3edd9;
                    color: #155724;
                    padding: 15px;
                    font-family: Arial;
                    border: hidden;
                    border-radius: 8px;
                    margin-left: auto;
                    margin-right: auto;
                    width: fit-content;'>

                    Password has been reset successfully. You can now log in.</p>";
}
?>

