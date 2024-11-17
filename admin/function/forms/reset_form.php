<?php require '../forgot_password/validate_token.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../../../assets/reset_form.css">

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
        <h1>New Password</h1>
        
        <div class="form">
            <!-- password do not match -->
            <div class="prompt" id="prompt"></div> 

            <form action="process_reset.php" method="POST" onsubmit="return validatePasswords();">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                <input type="password" id="new_password" name="new_password" placeholder="Create new password" required>
                <input type="password" id="confirm_password" name="confirm" placeholder="Confirm your password" required>
                <button>Reset password</button>
            </form> 
        </div>
        
    </div>

    <script>
        function validatePasswords() {
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const prompt = document.getElementById('prompt');

            if (newPassword !== confirmPassword) {
                prompt.textContent = 'Passwords do not match. Please try again.';
                prompt.style.display = 'block';
                return false; // Prevent form submission
            }

            const passwordRegex = /^(?=.*\d).{8,}$/; // Regex to check for at least 8 characters and one number
            if (!passwordRegex.test(newPassword)) {
                prompt.textContent = "Password must be at least 8 characters long and contain at least one number.";
                prompt.style.display = 'block'; // Show the prompt div with the message
                return false; // Prevent form submission
            }

            // Clear any previous messages if passwords match
            prompt.textContent = "";
            prompt.style.display = 'none';
            return true; // Allow form submission
        }
    </script>
</body>
</html>