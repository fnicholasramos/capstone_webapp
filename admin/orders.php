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

        <div class="input_container">
            <h3>IVF Label</h3>

            <div class="selected">
                <span>Patient Name: <u id="patientName"></u></span>
            </div>

            <div class="fluid">
                <span>IV Fluid: 
                    <input type="text" min="0" placeholder="Name of IVF" class="iv_fluid"><br><br>
                    Volume:
                    <input type="number" placeholder="L" min="0" class="inputs"><br><br>
                    Flow Rate:
                    <input type="number" placeholder="cc/hr" min="0" class="inputs flowr3">
                </span>
            </div>

            <div class="fluid">
                <div class="incorporation">
                    <span>Incorporation: <input type="text" placeholder="optional"></span>
                </div>
                <div class="ivf_no">
                    <span>IVF no. <input type="number" min="0" class="inputs"></span>
                </div>
                <div class="dateStarted">
                    <span>Date and Time Started: <input type="text" placeholder="mm/dd/yyyy" class="inputs"> <input type="text" placeholder="hh:mm:ss:tt" class="inputs"></span>
                </div>
                <div class="consumed">
                    <span>Date and Time to be consumed: <input type="text" placeholder="mm/dd/yyyy" class="inputs"> <input type="text" placeholder="hh:mm:ss:tt" class="inputs"></span>
                </div>
                <div class="nurse">
                    <span>Nurse on Duty: <input type="text" placeholder="Name"></span>
                </div>
            </div>
            

            <div class="buttons">
                <span>
                    <button class="submit">Submit</button>
                    <button class="clear">Clear</button>
                </span>
            </div>
        </div>
    </div>

    <script src="function/orders/search_suggestion.js"></script>
    <script src="function/orders/insert_result.js"></script>
</body>
</html>