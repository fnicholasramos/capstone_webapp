<?php
include 'admin/db.php';

$error_message = "";

// Initialize attempts and lockout time if not set
if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
}

if (!isset($_SESSION['lockout_time'])) {
    $_SESSION['lockout_time'] = 0;
}

// Check if user is locked out
$remaining_lockout = 0;
if ($_SESSION['attempts'] >= 3) {
    $remaining_lockout = 30 - (time() - $_SESSION['lockout_time']);
    if ($remaining_lockout > 0) {

    } else {
        // Reset attempts and clear lockout state after lockout period
        $_SESSION['attempts'] = 0;
        $_SESSION['lockout_time'] = 0;
        $error_message = ""; // Clear the error message
    }
}

// Process login attempt if not locked out
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SESSION['attempts'] < 3) {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Prevent SQL injection
    $inputUsername = $conn->real_escape_string($inputUsername);

    // Fetch user details from database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($inputPassword, $user['password'])) {
            // Successful login

            // Start session and set session variables
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];   
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['id'];

            // Retrieve the user's privilege/role
            $_SESSION['privilege'] = $user['privilege'];  // Store the privilege in session

            // Reset login attempts on successful login
            $_SESSION['attempts'] = 0;
            $_SESSION['lockout_time'] = 0;

            header("Location: admin/dashboard.php");
            exit;
        } else {
            // Invalid password
            $_SESSION['attempts'] += 1;
            if ($_SESSION['attempts'] >= 3) {
                $_SESSION['lockout_time'] = time();
            }
            $error_message = "Invalid username or password.";
        }
    } else {
        // Invalid username
        $_SESSION['attempts'] += 1;
        if ($_SESSION['attempts'] >= 3) {
            $_SESSION['lockout_time'] = time();
        }
        $error_message = "Invalid username or password.";
    }
}

$conn->close();
?>
