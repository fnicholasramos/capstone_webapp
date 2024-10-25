<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/management.css">
    <link rel="stylesheet" href="../assets/modal/pop.css">
    
    <!-- Montserrat font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
 
    <!-- Inter font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <style>

    </style>
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
                <input type="text" placeholder="Ex. Ramon Gemaguin">
            </span>
        </div>

        <div class="table">
            <table>
                <!-- header -->
                <tr>
                    <th style="text-align: left;">Patient Name</th>
                    <th style="text-align: left;">Room Number</th>
                    <th style="text-align: left;">Date of Birth</th>
                    <th>Actions</th>
                </tr>

                <tr>
                    <td>Francis Nicholas P. Ramos</td>
                    <td>101</td>
                    <td>January 5, 1985</td>
                    <td>Edit | Delete</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add New Patient</h2>
        <form>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" placeholder="Enter patient name"><br><br>

            <label for="room">Room Number:</label><br>
            <input type="text" id="room" name="room" placeholder="Enter room number"><br><br>

            <label for="dob">Date of Birth:</label><br>
            <input type="date" id="dob" name="dob"><br><br>

            <input type="submit" value="Add Patient">
        </form>
      </div>

    </div>

    <script src="../assets/modal/pop.js">
      
    </script>

</body>
</html>
