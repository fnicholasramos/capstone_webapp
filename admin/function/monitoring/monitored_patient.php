<?php

include 'db.php';

// SQL query to select patient data
$sql = "SELECT id, patient_name, iv_fluid_name, volume, flow_rate, incorp, ivf_no, date_started, time_started, date_consumed, time_consumed, nurse FROM doc_orders";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['patient_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['iv_fluid_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['flow_rate']) . "</td>";
        echo "<td>" . htmlspecialchars($row['volume']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nurse']) . "</td>";
        echo "<td>
                <div class='dropdown'>
                    <button class='dropdown-button' onclick='toggleDropdown(event)'>Select &#11206;</button>
                    <div class='dropdown-menu'>
                        <a href='#' onclick=\"openEditModal(
                            '{$row['id']}',
                            '{$row['patient_name']}',
                            '{$row['iv_fluid_name']}',
                            '{$row['volume']}',
                            '{$row['flow_rate']}',
                            '{$row['incorp']}',
                            '{$row['ivf_no']}',
                            '{$row['date_started']}',
                            '{$row['time_started']}',
                            '{$row['date_consumed']}',
                            '{$row['time_consumed']}',
                            '{$row['nurse']}'
                        )\">View</a>
                        <a href='#'>Discharge</a>
                    </div>
                </div>
                
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6' style='color: red;'>No patients found</td></tr>";
}

// Close the database connection
$conn->close(); 
?>
