<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
    <link rel="stylesheet" href="../assets/prescription.css">

    <!-- Montserrat font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- form 1 -->
        <div class="prescriptionBox">
            <!-- <textarea name="" class="prescription" rows="18" cols="40" placeholder="Enter your comments here..."></textarea> -->
            <form action="function/prescription/submit_order.php" method="POST"> 
                <h2>Prescription</h2><br>
                <!-- Your form fields here -->
                <div class="form-container">
                    <div class="firstrow">
                        <span><p>Patient:</p> <input type="text" name="patient_name" placeholder="Juan Dela Cruz" required></span><br>
                        <span><p>Diagnostic:</p> <input type="text" name="diagnostic" placeholder="Ex. Dengue" required></span><br>
                        <span><p>Room No:</p> <input type="text" name="room_no" placeholder="Ex. 0001" required></span><br>
                        <span><p>Device ID:</p> <input type="text" name="device_id" placeholder="pt0001" required></span><br>
                        <span><p>IV Fluid:</p> <input type="text" name="iv_fluid" placeholder="Name of IVF" required></span><br>
                        <span><p>Volume:</p> <input type="number" name="volume" min="0" placeholder="mL" required></span><br>
                        <span><p>Per Hour:</p> <input type="number" name="per_hour" min="0" placeholder="hour" required></span><br>
                        <span><p>Drop Factor:</p> <input type="number" name="drop_factor" min="0" placeholder="Drop Factor" required></span><br>
                    </div>
                    <div class="secondrow">
                        <span><p>Per Minutes:</p> <input type="number" name="per_minute" min="0" placeholder="Ex. 60mins" required></span><br>
                        <span><p>Incorporation:</p> <input type="text" name="incorporation" placeholder="optional"></span><br>
                        <span><p>IVF No:</p> <input type="text" name="ivf_no" min="0" placeholder="Count of IVF" required></span><br>
                        <span><p>Date Started:</p> <input type="date" name="date_started" required></span><br>
                        <span><p>Time Started:</p> <input type="text" name="time_started" placeholder="hh:mm" required></span><br>
                        <span><p>Date to consumed:</p> <input type="date" name="date_to_consumed" required></span><br>
                        <span><p>Time to consumed:</p> <input type="text" name="time_to_consumed" placeholder="hh:mm" required></span><br>
                        <span><p>Nurse on duty:</p> <input type="text" name="nurse_on_duty" placeholder="Name" required></span><br>
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" class="submit">Submit</button>
                    <button type="reset" class="reset">Reset</button>
                </div>
            </form>


        </div>
    

    </div>
</body>
</html>