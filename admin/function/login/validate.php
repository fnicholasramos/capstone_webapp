<?php

include 'admin/db.php';

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
        session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['loggedin'] = true;

        // echo "Login successful! Welcome, " . $user['username'];
        // Redirect to a protected page, for example:
        header("Location: admin/dashboard.php");
    } else {
        echo "<p style='color: red;'>Invalid username or password.</p>";
    }
}

$conn->close();
?>
