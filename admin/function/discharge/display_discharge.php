<?php
include 'db.php';

$sql = "SELECT id, patient_name, iv_fluid, admission_date, admission_time, discharge_date, discharge_time, ivf_no FROM discharge ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        
        // Patient Name
        echo "<td>" . htmlspecialchars($row['patient_name']) . "</td>";
        
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
        
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6' style='color: red;'>No records found.</td></tr>";
}
$conn->close();
?>
