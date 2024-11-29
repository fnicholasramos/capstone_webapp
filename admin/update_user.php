<?php
include 'db.php';

$currentUsername = '';
$currentEmail = '';

// If the form is submitted, update the user data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $userId = $_POST['user_id'];  // Ensure user_id is passed from the form
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];

    // Update the username and email
    $updateSql = "UPDATE users SET username = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("ssi", $newUsername, $newEmail, $userId);
    $stmt->execute();

    // Redirect after updating
    header("Location: landpage.php");
    exit;  // Prevent further code execution
}

// Fetch the current user's data when the page loads
if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];  // Fetch user ID from URL parameter

    // Ensure the user_id exists in the database
    $sqlUser = "SELECT username, email FROM users WHERE id = ?";
    $stmt = $conn->prepare($sqlUser);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($currentUsername, $currentEmail);
    $stmt->fetch();
    $stmt->close();
}
?>
