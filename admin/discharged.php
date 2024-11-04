<?php include 'function/login/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/management.css">

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
        </div>
        
        <div class="searchbar">
            <span class="search">
                Search: 
                <input type="text" placeholder="Ex. Ramon Gemaguin">
            </span>
        </div>

        <div class="table">
            <table>
                <!-- header -->
                <tr>
                    <th style="text-align: left;">Patient Name</th>
                    <th style="text-align: left;">Admission Date and Time</th>
                    <th style="text-align: left;">Discharge Date and Time</th>
                    <th>IVF no.</th>
                </tr>

                <tr>
                    <td>Edsel Gemaguim</td>
                    <td>2024-10-17</td>
                    <td>2024-10-17</td>
                    <td>5</td>
                </tr>
            </table>
        </div>
    </div>
    
</body>
</html>