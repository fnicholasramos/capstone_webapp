<?php
include 'db.php';

$sql = "SELECT id, username FROM users";
$result = $conn->query($sql);

// Check if the form was submitted to update user data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $userId = $_POST['user_id'];
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];

    // Update the username and email
    $updateSql = "UPDATE users SET username = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("ssi", $newUsername, $newEmail, $userId);
    $stmt->execute();
    echo "User updated successfully!";
}

// Fetch the current user's username and email if a user is selected
$currentUsername = '';
$currentEmail = '';
if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    $sqlUser = "SELECT username, email FROM users WHERE id = ?";
    $stmt = $conn->prepare($sqlUser);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($currentUsername, $currentEmail);
    $stmt->fetch();
}
?>

