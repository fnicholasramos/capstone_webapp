<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report</title>
    <!-- <link rel="stylesheet" href="../assets/report.css"> -->

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
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.top {
    display: flex;
    justify-content: center;
    /* border: 1px solid red; */
    font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.trio {
    display: flex;
}

.jrrmc {
    color: #333;
}

.republic {
    text-decoration: underline;
    
    margin-bottom: -2px;
}

.half {
    display: flex;
    flex-direction: column;
    margin-top: 10px;
    margin-left: 3px;

}

h2 {
    margin-top: 25px;
}

.information {
    font-family: 'Inter';
    display: flex;
    flex-direction: column;
    /* border: 1px solid #969696; */
    width: 600px;
    height: 800px;
    margin-left: auto;
    margin-right: auto;
    padding: 40px;
}

h3 {
    color: #1c5c3f;
}

p {
    font-size: 17px;
    font-weight: 500;
}

h3, p {
    margin-bottom: 15px;
}
</style>

<body>
    <div class="container">


        <div class="information">
            <div class="top">
                <div class="trio">
                    
                    <img src="../assets/images/jrrmc_logo.png" height="70px">
                    <div class="half">
                        <p class="republic">Republic of the Philippines Department of Health</p>
                        <h3 class="jrrmc">JOSE R. REYES MEMORIAL MEDICAL CENTER</h3>
                    </div>
                </div>
            
            </div>

            <h2 style="text-align: center;">HOSPITAL REPORT</h2>
            
            <br><br>

            <h3>Patient Info</h3>
            <p>Full Name:</p>
            <p>Diagnostic:</p>
            <p>Nurse on Duty:</p>
            
            <br>

            <h3>IVF Intake</h3>
            <p>IVF Name:</p>
            <p>IVF No:</p>

            <br>

            <h3>Admission</h3>
            <p>Admission Date & Time:</p>
            <p>Discharge Date & Time:</p>
        </div>
    </div>
</body>
</html>