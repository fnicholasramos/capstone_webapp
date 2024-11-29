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

<style>
    .hidden {
        display: none;
    }
</style>

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
                    <th>Room No.</th>
                    <th>Device ID</th>
                    <th>Flow Rate (mL/h)</th>
                    <th>Drip Rate</th>
                    <th>Volume Remaining (mL)</th>
                    <th>Percent(%)</th>
                    <th>Nurse</th>
                    <th>Actions</th>
                </tr>

                <tbody id="real-time">
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
                        <span>Patient Name: <input type="input" name="patientName" id="name" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> ></span>
                        
                    </div>

                    <div class="fluid">
                        
                        <span>
                            Device ID: 
                            <input type="text" name="device" class="inputs" id="device" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> >
                            Room No: 
                            <input type="text" name="room" class="inputs" id="room" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> ><br><br>
                            IV Fluid:
                            <input type="text" name="iv_fluid" min="0" placeholder="Name of IVF" class="iv_fluid" id="iv_name" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> ><br><br>

                            Flow Rate: 
                            <!-- Volume -->
                            <input type="number" id="volume" name="volume" placeholder="L" min="0" class="inputs" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> > /
                            <!-- Hours -->
                            <input type="number" id="flow_rate" name="flow_rate" placeholder="cc/hr" min="0" class="inputs flowr3" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> > 
                            = <span id="answer" class="second_flow_rate"></span>
                            <input type="hidden" id="hidden_answer" name="answer" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> ><br><br>


                            <!-- Drip rate  -->
                            Drip Rate: 
                            <span class="second_flow_rate border_answer"></span> x
                            <input type="number" name="drop_factor" id="drop_factor" class="drop_factor" placeholder="Drop Factor" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?>  required> /
                            <input type="number" name="minutes" id="minutes" class="minutes" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?>  placeholder="Ex. 60mins"> =
                            <span class="drip_rate_answer"></span>
                            <input type="hidden" id="drip_rate_answer" class="drip_rate_answer" name="drip_rate_answer" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> >
                            <span id="drip_rate_display" class="drip_rate_display"></span>
                        </span>
                    </div>

                    <div class="fluid">
                        <div class="incorporation">
                            <span>Incorporation: <input type="text" name="incorporation" id="incorp" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?>  placeholder="optional"></span>
                        </div>
                        <div class="ivf_no">
                            <span>IVF no. <input type="number" name="ivf_no" id="iv_no" min="0" class="inputs" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> ></span>
                        </div>
                        <div class="dateStarted">
                            <span>Date and Time Started: 
                                <input type="date" name="date_started" id="dateStarted" placeholder="mm/dd/yyyy" class="inputs" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> >
                                <input type="text" name="time_started" id="timeStarted" placeholder="hh:mm:ss:tt" class="inputs" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> >
                            </span>
                        </div>
                        <div class="consumed">
                            <span>Date and Time to be consumed:
                                <input type="text" name="date_consumed" id="dateConsumed" placeholder="mm/dd/yyyy" class="inputs" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> >
                                <input type="text" name="time_consumed" id="timeConsumed" placeholder="hh:mm:ss:tt" class="inputs" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> >
                            </span>
                        </div>
                        <div class="nurse">
                            <span>Nurse on Duty: <input type="text" name="nurse" id="nurse" placeholder="Name" <?php echo ($_SESSION['privilege'] !== 'admin') ? 'disabled' : ''; ?> ></span>
                        </div>
                    </div>

                        
                    <div class="buttons">
                        <span>
                        <?php if (isset($_SESSION['privilege']) && $_SESSION['privilege'] === 'admin'): ?>
                            <button type="submit" class="submit">Save</button>
                        <?php endif; ?>
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
    <script src="function/monitoring/real-time-updates.js"></script>

    <script>
        const userPrivilege = "<?php echo isset($_SESSION['privilege']) ? $_SESSION['privilege'] : ''; ?>";
    </script>

</body>

</html>