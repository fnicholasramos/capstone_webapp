<?php
require_once('../vendor/autoload.php');
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Fetch data using a JOIN
    $sql = "SELECT 
                d.id AS discharge_id, 
                o.patient_name, 
                o.diagnose, 
                o.nurse, 
                o.iv_fluid_name AS iv_fluid, 
                o.ivf_no, 
                d.admission_date, 
                d.admission_time, 
                d.discharge_date, 
                d.discharge_time
            FROM discharge d
            JOIN doc_orders o ON d.doc_order_id = o.id
            WHERE d.id = ?";
    
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

    $pdf->SetFont('helvetica', '', 13.5); // Font size set to 13.5
    
    // HTML content
    $html = <<<EOD
<!DOCTYPE html>
<html lang="en">
<head>
<style>
/* Add your styles here */
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

} else {
    echo "Invalid ID.";
}
?>
