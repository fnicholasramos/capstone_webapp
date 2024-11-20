<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="assets/prompt.css">
    
    <!-- Inter font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..    32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<style>
    .display-none {
        display: none;
    }
</style>


<body>
    <div class="main">
        <div class="dash">
            <img src="assets/images/main.png" class="dashImage">
        </div>

        <div class="rightLogin">
            <div class="top">
                <img src="assets/images/iv_bag.png" alt="logo" height="85px" width="auto" class="logo">

                <span class="jrrmc">Health Guard IV Bag Monitoring System</span>
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
                            <div class="links">
                                <a href="admin/function/forms/create.php" id="account-link" class="forgot">Don't have an account?</a>
                                <a href="forgot.php" class="forgot">Forgot Password?</a>
                            </div>
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
        window.attempts = <?php echo $_SESSION['attempts']; ?>;
        window.lockoutTime = <?php echo max(0, 30 - (time() - $_SESSION['lockout_time'])); ?>;

        // check user count
        window.onload = function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'admin/function/forms/check_user_count.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var create = xhr.responseText; // Get the response (the class name)
                var accountLink = document.getElementById('account-link');
                if (create) {
                    accountLink.classList.add(create); // Add the class to hide the link
                }
            }
        };
        xhr.send();
    };
    </script>
    <script src="assets/error_countdown.js"></script>

</body>
</html>