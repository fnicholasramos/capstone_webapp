<?php include 'function/login/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/management.css">

    <link rel="stylesheet" href="../assets/visible_placeholder/search_highlight.css">

     <!-- Montserrat font-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
 
     <!-- Inter font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container"> 
        <div class="top">
            <h2>Discharged Patients</h2>

            <!-- <div class="printer">
                <button class="print"><img src="../assets/images/export.png" height="30px" class="print">Export</button>
            </div> -->
        </div>
        
        <div class="searchbar">
            <span class="search">
                Search: 
                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Ex. Ramon Gemaguin">
            </span>
        </div>

        <div class="table">
            <table id="patientTable">
                <!-- header -->
                <tr>
                    <th style="text-align: left;">Patient Name</th>
                    <th style="text-align: left;">Diagnostic</th>
                    <th style="text-align: left;">IV Fluid Name</th>
                    <th style="text-align: left;">Admission Date and Time</th>
                    <th style="text-align: left;">Discharge Date and Time</th>
                    <th>IVF no.</th>
                    <th>Nurse</th>
                    <th>Action</th>
                </tr>

                <tr>
                    <tbody>
                        <?php include 'function/discharge/display_discharge.php'; ?>
                    </tbody>
                </tr>
            </table>
        </div>
    </div>
    
    <script src="../assets/visible_placeholder/searchbar.js"></script>
</body>
</html>