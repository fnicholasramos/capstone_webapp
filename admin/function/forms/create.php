<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account</title>
    <link rel="stylesheet" href="../../../assets/create.css">

    <!-- Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form action="register.php" method="POST" onsubmit="return validatePasswords();">
            <h2>Create an Account</h2>

            <!-- Inputs -->
            <label>Email</label>
            <input type="text" name="email" required>

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" id="password" required>

            <label>Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
            
            <button type="submit">Create</button>

            <!-- Prompt Div for Errors -->
            <div class="prompt" id="prompt"></div>
        </form>
    </div>

    <script>
        // PHP Injected Error
        const phpError = "<?php echo isset($_POST['error_message']) ? htmlspecialchars($_POST['error_message']) : ''; ?>";

        if (phpError) {
            const prompt = document.getElementById('prompt');
            prompt.textContent = phpError;
            prompt.style.display = 'block';
        }

        // Validate Password Function
        function validatePasswords() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const prompt = document.getElementById('prompt');

            if (password !== confirmPassword) {
                prompt.textContent = 'Passwords do not match. Please try again.';
                prompt.style.display = 'block';
                return false; // Prevent form submission
            }

            const passwordRegex = /^(?=.*\d).{8,}$/; // At least 8 characters and 1 number
            if (!passwordRegex.test(password)) {
                prompt.textContent = "Password must be at least 8 characters long and contain at least one number.";
                prompt.style.display = 'block';
                return false; // Prevent form submission
            }

            // Clear any previous messages if valid
            prompt.textContent = "";
            prompt.style.display = 'none';
            return true; // Allow form submission
        }
    </script>
</body>
</html>
