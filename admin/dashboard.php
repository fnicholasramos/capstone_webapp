<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../assets/dashboard.css">
    <link rel="icon" href="https://jrrmmc.gov.ph/images/Logos/official-logo-PNG.png">
    
    <!-- Montserrat font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="content">
        <div class="sidebar">
            <div>
                <div class="top">
                    <img src="../assets/images/iv_bag.png" alt="logo" height="75px" width="auto">
                    <span class="top_title">Health Guard</span>
                </div>
                
                <div class="list">
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
                </div>
            </div>

            <div class="logout">
                <button class="out">
                    <span><img src="../assets/images/logout.png" height="40px">
                    Logout</span>
                </button>

                <span class="copyright">Copyright &copy; IV Bag Monitoring and Alert System 2025</span>
            </div>
        </div>

        <div class="info">
            <iframe src="" name="frame" width="100%" height="99%" style="border:none;"></iframe>
        </div>

        
    </div>

    
</body>
</html>