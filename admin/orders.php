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

<style>


</style>

<body>
    <div class="container">
        <div class="docInput">
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
                    <span>
                        Diagnostic: <input type="text" name="diagnose" placeholder="Ex. Dengue" required><br><br>

                        Room No: <input type="text" name="room" placeholder="Ex. 0001" class="room" required>

                        Device ID: <input type="text" name="device" placeholder="Ex. pt0001" class="device" required><br><br>

                        IV Fluid: <input type="text" name="iv_fluid" min="0" placeholder="Name of IVF" class="iv_fluid" required><br><br>
                        
                        
                        Flow Rate: 
                        <!-- Volume --> 
                        <input type="number" id="volume" name="volume" placeholder="mL" min="0" class="inputs" required> /
                        <!-- Hours -->
                        <input type="number" id="flow_rate" name="flow_rate" placeholder="hour" min="0" class="inputs flowr3" required>

                        = <span id="answer" class="second_flow_rate"></span>
                        <input type="hidden" id="hidden_answer" name="answer"><br><br>

                        Drip Rate: 
                        <span class="second_flow_rate border_answer"></span> x
                        <input type="number" name="drop_factor" id="drop_factor" class="drop_factor" placeholder="Drop Factor" required> /
                        <input type="number" name="minutes" id="minutes" class="minutes" placeholder="Ex. 60mins"> =
                        <span class="drip_rate_answer"></span>
                        <input type="hidden" id="drip_rate_answer" class="drip_rate_answer" name="drip_rate_answer">
                        <span id="drip_rate_display" class="drip_rate_display"></span>

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
                            <input type="text" name="time_started" placeholder="hh:mm" class="inputs" required>
                        </span>
                    </div>
                    <div class="consumed">
                        <span>Date and Time to be consumed: 
                            <input type="date" name="date_consumed" placeholder="mm/dd/yyyy" class="inputs" required> 
                            <input type="text" name="time_consumed" placeholder="hh:mm" class="inputs" required>
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

        <!-- form 2 -->
        <div class="output">
            <h2 class="orders">Prescription Orders</h2>
            <div class="view">
                <?php include 'function/prescription/view_order.php';?>

            </div>

            
        </div>
    </div>

    <script src="function/orders/search_suggestion.js"></script>
    <script src="function/orders/insert_result.js"></script>
    <script src="function/orders/patient_name.js"></script>
    <script src="function/orders/calculate_flowrate.js"></script>

    <script>
    function toggleDetails(element) {
        const detailsDiv = element.querySelector('.details');
        if (detailsDiv.classList.contains('hidden')) {
            detailsDiv.classList.remove('hidden');
            detailsDiv.classList.add('visible');
        } else {
            detailsDiv.classList.remove('visible');
            detailsDiv.classList.add('hidden');
        }
    }

    // delete prescription row
    function deleteRow(event, id) {
    event.stopPropagation(); // Prevents the parent div click event from firing
    if (confirm("Are you sure you want to DELETE this prescription record?")) {
        // Send a request to delete the row
        fetch('function/prescription/delete_order.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.text())
        .then(data => {
            if (data === "success") {
                alert("Record deleted successfully.");
                location.reload(); // Refresh the page to update the displayed records
            } else {
                alert("Failed to delete the record. Please try again.");
            }
        })
        .catch(err => {
            console.error("Error:", err);
        });
    }
}
    </script>

    
</body>
</html>