<?php
include '../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        sendErrorBack("Invalid email format");
        exit();
    }

    $checkSql = "SELECT email, username FROM users WHERE email = ? OR username = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("ss", $email, $username);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        sendErrorBack("Email or username already exists");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $username, $hashedPassword);

    if ($stmt->execute()) {
        header("Location: ../../../login.php");
        exit();
    } else {
        sendErrorBack("An error occurred during registration");
    }
}

function sendErrorBack($message) {
    echo "
        <form id='error-form' action='create.php' method='POST'>
            <input type='hidden' name='error_message' value='" . htmlspecialchars($message) . "'>
        </form>
        <script>
            document.getElementById('error-form').submit();
        </script>
    ";
}
?>
