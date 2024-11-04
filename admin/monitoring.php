<?php include 'function/login/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/monitoring.css">

    <link rel="stylesheet" href="function/management/delete.css">
    

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
        <h2>Patient Monitoring</h2>

        <div class="searchbar">
            <span>Search: <input type="text" placeholder="Ex. Ramon Salasalan" class="bar">
            </span>
        </div>

        <div class="table">
            <table>
                <!-- header -->
                <tr>
                    <th style="text-align: left;">Patient Name</th>
                    <th width="30px">Ward Number</th>
                    <th width="150px">Flow Rate (mL/h)</th>
                    <th width="200px">Volume Remaining (mL)</th>
                    <th width="200px">Nurse</th>
                    <th>Actions</th>
                </tr>

                <tbody>
                    <?php include 'function/monitoring/monitored_patient.php'; ?>
                </tbody>
            </table>
        </div>

        <!-- Modal -->

    </div>  

    <script src="function/management/edit.js"></script>
    <script src="function/management/delete.js"></script>
</body>
</html>