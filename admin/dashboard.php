<?php include 'function/login/session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../assets/dashboard.css">
    <link rel="stylesheet" href="../assets/digital_clock.css">
    <link rel="icon" href="https://jrrmmc.gov.ph/images/Logos/official-logo-PNG.png">
    
    <!-- Montserrat font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Digital Clock Font (Audiowide) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Orbitron:wght@400..900&family=VT323&display=swap" rel="stylesheet">
</head>
<body>
    <div class="content">
        <div class="sidebar">
            <div class="second-container">
                <div class="top">
                    <img src="../assets/images/iv_bag.png" alt="logo" height="75px" width="auto" class="top_logo">

                    <a href="dashboard.php" class="landPage">
                        <span class="top_title">Health Guard</span>
                    </a>

                    <img src="../assets/images/close.png" alt="menu" class="cancel" height="25px">
                    <img src="../assets/images/hamburger.png" alt="menu" onclick="toggleSidebar()" class="menu" height="25px">
                    
                </div>
                
                <div class="list" id="list">
                    <ul>
                        <div class="ramon">
                            <a href="../admin/orders.php" target="frame"><li><span class="doc"><img src="../assets/images/pin.png" height="40px" class="icon">Doctor's Orders Input</span></li></a>
                        </div>
                        
                        <div class="ramon">
                            <a href="../admin/monitoring.php" target="frame"><li><span class="doc"><img src="../assets/images/teacher.png" height="40px" class="icon"></span>Patient Monitoring</li></a>
                        </div>
                        
                        <div class="ramon">
                            <a href="../admin/management.php" target="frame"><li><span class="doc"><img src="../assets/images/person.png" height="40px" class="icon"></span>Patient Management</li></a>
                        </div>

                        <div class="ramon">
                            <a href="../admin/discharged.php" target="frame"><li><span class="doc"><img src="../assets/images/door-open.png" height="30px" class="icon"></span>Discharged Patients</li></a>
                        </div>
                    </ul>

                    <div class="logout-mobile">
                        <button class="out">
                            <span><img src="../assets/images/logout.png" height="40px">
                            Logout</span>
                        </button>
                    </div>

                </div>

            </div>

            <!-- Digital Clock -->
            <div class="clock-container">
                <div id="date-display" class="date"></div>
                <div id="time-display" class="time"></div>
            </div>

            <!-- logout -->
            <div class="logout">
                <form action="function/login/logout.php" method="POST">
                    <button class="out">
                        <span><img src="../assets/images/logout.png" height="40px">
                        Logout</span>
                    </button>
                </form>

                <span class="copyright">Copyright &copy; IV Bag Monitoring and Alert System 2025</span>
            </div>
        </div>

        <div class="info">
            <iframe src="landpage.php" name="frame"></iframe>
        </div>

        
    </div>

    <script src="../assets/digital_clock.js"></script>
    <script src="../assets/mobile_slidebar.js"></script>
    
</body>
</html>