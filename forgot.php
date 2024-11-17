<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password?</title>
    <link rel="stylesheet" href="assets/forgot.css">

    <!-- Inter font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..    32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

     <!-- Montserrat -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="top">
            <h1>Forgot password?</h1>
            <p>Please enter your email for your account</p>
        </div>
            
        <div class="form">
            <form action="admin/function/forgot_password/mailer.php" method="POST">
                <p>Enter your email</p>
                <input type="email" name="email" required>

                <button type="submit">Request reset link</button>
            </form>
        </div>

        <a href="/capstone">&larr; Back To Login</a>
        <div class="prompt">
            <!-- Password reset link sent -->
            <?php 
            session_start();
            if (isset($_SESSION['error_message'])) {
                echo "<p class='error'>{$_SESSION['error_message']}</p>";
                unset($_SESSION['error_message']); // Clear message after displaying
            }

            if (isset($_SESSION['success_message'])) {
                echo "<p class='success'>{$_SESSION['success_message']}</p>";
                unset($_SESSION['success_message']); // Clear message after displaying
            }
            ?>
        </div>
    </div>
</body>
</html>