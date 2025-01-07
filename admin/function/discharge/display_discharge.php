<?php
include 'db.php';

$sql = "SELECT 
            d.id AS discharge_id, 
            o.patient_name, 
            o.diagnose, 
            o.iv_fluid_name AS iv_fluid, 
            d.admission_date, 
            d.admission_time, 
            d.discharge_date, 
            d.discharge_time, 
            o.ivf_no, 
            o.nurse
        FROM discharge d
        JOIN doc_orders o ON d.doc_order_id = o.id
        ORDER BY d.id DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        
        // Patient Name
        echo "<td>" . htmlspecialchars($row['patient_name']) . "</td>";

        // Diagnostic
        echo "<td>" . htmlspecialchars($row['diagnose']) . "</td>";
        
        // IV Fluid Name
        echo "<td>" . htmlspecialchars($row['iv_fluid']) . "</td>";
        
        // Date and Time Started
        echo "<td>
                <span>" . htmlspecialchars($row['admission_date']) . "</span> <strong>|</strong> 
                <span>" . htmlspecialchars($row['admission_time']) . "</span>
              </td>";
        
        // Discharge Date and Time
        echo "<td>
                <span>" . htmlspecialchars($row['discharge_date']) . "</span> <strong>|</strong> 
                <span>" . htmlspecialchars($row['discharge_time']) . "</span>
              </td>";
        
        // IVF Number (center-aligned)
        echo "<td style='text-align:center;'>" . htmlspecialchars($row['ivf_no']) . "</td>";

        echo "<td style='text-align:center;'>" . htmlspecialchars($row['nurse']) . "</td>";
        echo "<td><a href='generate_pdf.php?id=" . htmlspecialchars($row['discharge_id']) . "' target='_blank' class='generate'><img src='../assets/images/pdf.png' height='40px'></a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8' style='color: red;'>No records found.</td></tr>";
}
$conn->close();
?>
