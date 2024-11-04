<?php

include 'db.php';

// SQL query to select patient data
$sql = "SELECT id, patient_name, iv_fluid_name, flow_rate, volume, nurse FROM doc_orders";
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
                            
                        )\">View</a>
                        <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure to discharge patient?\");'>Discharge</a>
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
