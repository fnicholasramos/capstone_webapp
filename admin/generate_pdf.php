<?php
require_once('../vendor/autoload.php');
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Fetch row data
    $sql = "SELECT * FROM discharge WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    if (!$data) {
        die('No record found');
    }

    // Initialize PDF
    $pdf = new TCPDF();
    $pdf->SetCreator('Tcpdf'); // Use a string directly here
    $pdf->SetTitle('Report');
    $pdf->AddPage();

    $pdf->SetFont('helvetica', '', 13.5); // Font size set to 14
    
    // HTML content
    $html = <<<EOD
<!DOCTYPE html>
<html lang="en">
<head>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.top {
    display: flex;
    justify-content: center;
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
    text-align: center;
    margin-left: 3px;

}

h2 {
    margin-top: 25px;
}

.information {
    font-family: 'Inter';
    display: flex;
    flex-direction: column;
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

</head>
<body>
    <div class="container">
        <div class="half">
            <p class="republic">Republic of the Philippines Department of Health</p>
            <h3 class="jrrmc">JOSE R. REYES MEMORIAL MEDICAL CENTER</h3>
        </div>
            
        <h2 style="text-align: center;">HOSPITAL REPORT</h2>
        <div class="information">
            <h3>Patient Info</h3>
            <p>Full Name: {$data['patient_name']}</p>
            <p>Diagnostic: {$data['diagnose']}</p>
            <p>Nurse on Duty: {$data['nurse']}</p>
             
            <br>

            <h3>IVF Intake</h3>
            <p>IVF Name: {$data['iv_fluid']}</p>
            <p>IVF No: {$data['ivf_no']}</p>
            
            <br>

            <h3>Admission</h3>
            <p>Admission Date: {$data['admission_date']}</p>
            <p>Admission Time: {$data['admission_time']}</p>
            <p>Discharge Date: {$data['discharge_date']}</p>
            <p>Discharge Time: {$data['discharge_time']}</p>
        </div>
    </div>
</body>
</html>
EOD;
    // Write HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output PDF
    $pdf->Output('Hospital_Report_' . $data['patient_name'] . '.pdf', 'I'); // 'I' for inline display

    // Add footer with transparent text

} else {
    echo "Invalid ID.";
}
?>
