<?php include 'function/login/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/management.css">
    <link rel="stylesheet" href="../assets/modal/pop.css">
    <link rel="stylesheet" href="../assets/visible_placeholder/search_highlight.css">


    <link rel="stylesheet" href="function/management/delete.css">
    <link rel="stylesheet" href="function/management/edit.css">

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
                    <th style="text-align: left;">device_id</th>
                    <th style="text-align: left;">Liter</th>
                    <th style="text-align: left;">Percent</th>
                    <th>Actions</th>

                </tr>
                
                <tbody id="real-time">
                    <?php include 'function/management/display_patient.php'; ?>
                </tbody>
            </table>
        </div>
    </div>



    <!-- Add New patient  -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="title">Add New Patient</h2>
                <form action="function/management/add_patient.php" method="POST">
                    <label for="device_id">Device ID:</label>
                    <input type="text" id="device_id" name="device_id" required>    

                    <span class="inputs">Patient Name: <input type="text" name="name" placeholder="Ex. Ramon Gemaguim" required></span>
                    
                    <span class="inputs">Room Number: <input type="text" name="room" min="1" maxlength="4" inputmode="numeric" placeholder="Ex. 0001"  oninput="this.value = this.value.replace(/[^0-9]/g, '')" required ></span>
                    
                    <span class="inputs">Date of Birth: <input type="text" name="birth" placeholder="yyyy/mm/dd" required></span>
                    
                    <span class="inputs">Admit Date and Time: <input type="text" name="admit_date" placeholder="yyyy/mm/dd" class="date" required> <input type="text" name="admit_time" placeholder="hh:mm:ss" class="time" required></span>
                
                    <button type="submit" class="submit">Add Patient</button> <br>
                    <button type="button" class="cancel" id="cancel">Cancel</button>
                </form>
        </div>
    </div>

    <!-- Edit Patient Information -->
    <div id="editModal" class="modal-edit">
        <div class="modal-content-edit">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Edit Patient Information</h2>
            <form id="editForm" action="function/management/edit.php" method="POST">
                <input type="hidden" name="id" id="editId">
                
                <label for="patient_name">Patient Name:</label>
                <input type="text" name="patient_name" id="editPatientName" required>

                <label for="room_number">Room Number:</label>
                <input type="text" name="room_number" id="editRoomNumber" required>

                <label for="date_of_birth">Date of Birth:</label>
                <input type="text" name="date_of_birth" id="editDateOfBirth" required>

                <label for="admit_date">Admit Date:</label>
                <input type="text" name="admit_date" id="editAdmitDate" required>

                <label for="admit_time">Admit Time:</label>
                <input type="text" name="admit_time" id="editAdmitTime" required>

                <div class="edit-buttons">
                    <button type="submit" class="save">Save Changes</button>
                    <button type="button" class="cancel-edit" id="cancel" onclick="closeModal()">Cancel</button>
                </div>

            </form>
        </div>
    </div>



    <script src="../assets/visible_placeholder/searchbar.js"></script>
    <script src="../assets/modal/pop.js"></script>
    <script src="function/management/edit.js"></script>
    <script src="function/management/delete.js"></script>

    <script src="function/management/real-time-updates.js"></script>

</body>
</html>