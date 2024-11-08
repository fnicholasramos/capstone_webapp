<?php include 'function/login/session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/monitor.css">

    <link rel="stylesheet" href="../assets/visible_placeholder/search_highlight.css">

    <link rel="stylesheet" href="function/management/delete.css">
    <link rel="stylesheet" href="function/monitoring/view-details.css">

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
            <span>Search: <input type="text" id="searchInput" placeholder="Ex. Ramon Salasalan" onkeyup="searchTable()" class="bar"></span>
        </div>

        <div class="table">
            <table id="patientTable">
                <!-- header -->
                <tr>
                    <th>Patient Name</th>
                    <th>IV Fluid</th>
                    <th>Flow Rate (mL/h)</th>
                    <th>Volume Remaining (mL)</th>
                    <th>Nurse</th>
                    <th>Actions</th>
                </tr>

                <tbody>
                    <?php include 'function/monitoring/monitored_patient.php'; ?>
                </tbody>
            </table>
        </div>



        <!-- Modal -->
        <div id="editModal" class="modal-edit">
            <div class="input_container">
                <span class="close" onclick="closeModal()">&times;</span>
                <h3>View & Edit Details</h3>

                <form id="editForm" action="function/monitoring/edit-monitor.php" method="POST">
                    <input type="hidden" name="id" id="editId">
                    <div class="selected">
                        <span>Patient Name: <input type="input" name="patientName" id="name"></span>
                    </div>

                    <div class="fluid">
                        <span>IV Fluid:
                            <input type="text" name="iv_fluid" min="0" placeholder="Name of IVF" class="iv_fluid" id="iv_name"><br><br>
                            Volume:
                            <input type="number" name="volume" placeholder="L" min="0" class="inputs" id="volume"><br><br>
                            Flow Rate:
                            <input type="number" name="flow_rate" placeholder="cc/hr" min="0" class="inputs flowr3" id="flowRate">
                        </span>
                    </div>

                    <div class="fluid">
                        <div class="incorporation">
                            <span>Incorporation: <input type="text" name="incorporation" id="incorp" placeholder="optional"></span>
                        </div>
                        <div class="ivf_no">
                            <span>IVF no. <input type="number" name="ivf_no" id="iv_no" min="0" class="inputs"></span>
                        </div>
                        <div class="dateStarted">
                            <span>Date and Time Started:
                                <input type="text" name="date_started" id="dateStarted" placeholder="mm/dd/yyyy" class="inputs">
                                <input type="text" name="time_started" id="timeStarted" placeholder="hh:mm:ss:tt" class="inputs">
                            </span>
                        </div>
                        <div class="consumed">
                            <span>Date and Time to be consumed:
                                <input type="text" name="date_consumed" id="dateConsumed" placeholder="mm/dd/yyyy" class="inputs">
                                <input type="text" name="time_consumed" id="timeConsumed" placeholder="hh:mm:ss:tt" class="inputs">
                            </span>
                        </div>
                        <div class="nurse">
                            <span>Nurse on Duty: <input type="text" name="nurse" id="nurse" placeholder="Name"></span>
                        </div>
                    </div>


                    <div class="buttons">
                        <span>
                            <button type="submit" class="submit">Save</button>
                            <button type="button" class="clear" id="cancel">Exit</button>
                        </span>
                    </div>
            </div>
            </form>

        </div>
    </div>

    <script src="../assets/visible_placeholder/searchbar.js"></script>
    <script src="function/monitoring/edit-monitor.js"></script>
    <script src="function/management/delete.js"></script>
    <script src="function/monitoring/buttons.js"></script>
</body>

</html>