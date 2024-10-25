<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/management.css">
    <link rel="stylesheet" href="../assets/modal/pop.css">
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
            <h2>Patient Management</h2>
            <button class="newPatient" id="openModalBtn">Add New Patient</button>
        </div>
        
        <div class="searchbar">
            <span class="search">
                Search: 
                <input type="text" id="searchInput" placeholder="Ex. Ramon Gemaguin" onkeyup="searchTable()">
            </span>

        </div>

        <div class="table">
            <table id="patientTable">
                <!-- header -->
                <tr>
                    <th style="text-align: left;">Patient Name</th>
                    <th style="text-align: left;">Room Number</th>
                    <th style="text-align: left;">Date of Birth</th>
                    <th style="text-align: left;">Admit Date</th>
                    <th style="text-align: left;">Admit Time</th>
                    <th>Actions</th>
                </tr>
            <tbody>
                <?php include 'function/management/display_patient.php'; ?>
                <!-- <tr>
                    <td></td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr> -->
            </tbody>
            </table>
        </div>
    </div>


    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="title">Add New Patient</h2>
                <form action="function/management/add_patient.php" method="POST">
                    <span class="inputs">Patient Name: <input type="text" name="name" placeholder="Ex. Ramon Gemaguim" required></span>
                    
                    <span class="inputs">Room Number: <input type="text" name="room" min="1" maxlength="4" inputmode="numeric" placeholder="Ex. 0001"  oninput="this.value = this.value.replace(/[^0-9]/g, '')" required ></span>
                    
                    <span class="inputs">Date of Birth: <input type="text" name="birth" placeholder="yyyy/mm/dd" required></span>
                    
                    <span class="inputs">Admit Date and Time: <input type="text" name="admit_date" placeholder="yyyy/mm/dd" class="date" required> <input type="text" name="admit_time" placeholder="hh:mm:ss" class="time" required></span>
                
                    <button type="submit" class="submit">Add Patient</button> <br>
                    <button type="button" class="cancel" id="cancel">Cancel</button>
                </form>
        </div>
    </div>

    <script src="../assets/visible_placeholder/searchbar.js"></script>
    <script src="../assets/modal/pop.js"></script>

</body>
</html>