<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="assets/prompt.css">

    <link rel="icon" href="https://jrrmmc.gov.ph/images/Logos/official-logo-PNG.png">
    
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
    <div class="main">
        <div class="dash">
            <img src="assets/images/onm.jpg" class="dashImage">
        </div>

        <div class="rightLogin">
            <div class="top">
                <img src="assets/images/onm_logo.png" alt="logo" height="78px" width="auto" class="logo">

                <span class="jrrmc">Ospital ng Maynila Medical Center</span>
            </div>

            <div class="login">
                <div class="loginInput">
                    <form method="POST" id="loginForm">
                        <div>
                            <input type="text" name="username" placeholder="Username" required>
                        </div>

                        <div>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        
                        <div class="buttons">
                            <a href="https://example.com" class="forgot">Forgot Password?</a>
                            <button type="input">Login</button>
                        </div>
                        

                        <?php include 'admin/function/login/validate.php'; ?>

                        <?php if (!empty($error_message)): ?>
                            <div class="error-message"><?php echo $error_message; ?></div>
                        <?php endif; ?>
                        
                        <div class="error-message" id="countdownMessage" style="display: none;"></div>
                    </form>
                </div>

            </div>

            <div class="footer">
                <span class="project_title">Copyright &copy; IV Bag Monitoring and Alert System 2025</span>
            </div>
        </div>
    </div>

    <!-- mobile view -->



    <script>
    // JavaScript to disable form and display countdown timer
    document.addEventListener('DOMContentLoaded', function() {
        <?php if ($_SESSION['attempts'] >= 3): ?>
            disableForm();
            // Pass the remaining lockout time to JavaScript from PHP
            startCountdown(<?php echo max(0, 30 - (time() - $_SESSION['lockout_time'])); ?>);
        <?php endif; ?>
    });

    function disableForm() {
        document.getElementById("loginForm").querySelectorAll("input, button").forEach(element => {
            element.disabled = true;
        });
    }

    function startCountdown(duration) {
        const countdownMessage = document.getElementById("countdownMessage");
        countdownMessage.style.display = 'block';

        let remainingTime = duration;

        const interval = setInterval(() => {
            countdownMessage.textContent = "Too many attempts. Try again in " + remainingTime + " seconds.";

            if (remainingTime <= 0) {
                clearInterval(interval);
                countdownMessage.style.display = 'none';
                enableForm();
            }
            remainingTime--;
        }, 1000);
    }

    function enableForm() {
        document.getElementById("loginForm").querySelectorAll("input, button").forEach(element => {
            element.disabled = false;
        });
    }
</script>

</body>
</html>