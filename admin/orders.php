<?php include 'function/login/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/orders.css">
    <link rel="stylesheet" href="function/orders/searchbar.css">

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
        <h2>Doctor's Orders Input</h2>

        <div class="searchbar">
            <span>Search Patients:</span>
            <input type="text" placeholder="Ex. Ramon Salasalan" class="bar" id="searchInput" onkeyup="searchSuggestions()">
            <div id="suggestionBox" class="suggestion-box">test</div>
            <button class="insert" onclick="insertText()">Insert</button>
        </div>

        <form id="ivfForm" action="function/orders/insert_order.php" method="POST" onsubmit="copyPatientName()">
            <div class="input_container">
                <h3>IVF Label</h3>

                <div class="selected">
                    <!-- <span>Patient Name: <u id="patientName"></u></span> -->
                    <span>Patient Name: <u id="patientName"></u></span>
                    <input type="hidden" name="patientName" id="hiddenPatientName">
                </div>

                <div class="fluid">
                    <span>IV Fluid: 
                        <input type="text" name="iv_fluid" min="0" placeholder="Name of IVF" class="iv_fluid" required><br><br>
                        Volume:
                        <input type="number" name="volume" placeholder="mL" min="0" class="inputs" required><br><br>
                        Flow Rate:
                        <input type="number" name="flow_rate" placeholder="cc/hr" min="0" class="inputs flowr3" required>
                    </span>
                </div>

                <div class="fluid">
                    <div class="incorporation">
                        <span>Incorporation: <input type="text" name="incorporation" placeholder="optional"></span>
                    </div>
                    <div class="ivf_no">
                        <span>IVF no. <input type="number" name="ivf_no" min="0" class="inputs" required></span>
                    </div>
                    <div class="dateStarted">
                        <span>Date and Time Started: 
                            <input type="date" name="date_started" placeholder="mm/dd/yyyy" class="inputs" required> 
                            <input type="text" name="time_started" placeholder="hh:mm:ss:tt" class="inputs" required>
                        </span>
                    </div>
                    <div class="consumed">
                        <span>Date and Time to be consumed: 
                            <input type="date" name="date_consumed" placeholder="mm/dd/yyyy" class="inputs" required> 
                            <input type="text" name="time_consumed" placeholder="hh:mm:ss:tt" class="inputs" required>
                        </span>
                    </div>
                    <div class="nurse">
                        <span>Nurse on Duty: <input type="text" name="nurse" placeholder="Name" required></span>
                    </div>
                </div>
                

                <div class="buttons">
                    <span>
                        <button type="submit" class="submit">Submit</button>
                        <button type="reset" class="clear">Clear</button>
                    </span>
                </div>
            </div>
        </form>
    </div>

    <script src="function/orders/search_suggestion.js"></script>
    <script src="function/orders/insert_result.js"></script>
    <script src="function/orders/patient_name.js"></script>
    
</body>
</html>