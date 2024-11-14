<?php
include 'db.php';

$sql = "SELECT pm.id, pm.patient_name, pm.room_number, pm.date_of_birth, pm.admit_date, pm.admit_time, 
               iv.device_id, iv.liter, iv.percent 
        FROM patient_management pm 
        LEFT JOIN iv_data iv ON pm.device_id = iv.device_id 
        ORDER BY pm.id DESC";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Use print_r for debugging (remove it after testing)
        echo "<tr>
                <td>{$row['patient_name']}</td>
                <td>{$row['room_number']}</td>
                <td>{$row['date_of_birth']}</td>
                <td>{$row['admit_date']}</td>
                <td>{$row['admit_time']}</td>
                <td>" . (!empty($row['device_id']) ? $row['device_id'] : "N/A") . "</td>
                <td>{$row['liter']}</td>
                <td>{$row['percent']}</td>
                <td>
                    <div class='dropdown'>
                        <button class='dropdown-button' onclick='toggleDropdown(event)'>Select &#11206;</button>
                        <div class='dropdown-menu'>
                            <a href='#' onclick=\"openEditModal(
                                '{$row['id']}',
                                '{$row['patient_name']}', 
                                '{$row['room_number']}', 
                                '{$row['date_of_birth']}', 
                                '{$row['admit_date']}', 
                                '{$row['admit_time']}',
                                '{$row['device_id']}',
                                '{$row['liter']}',
                                '{$row['percent']}'
                            )\">Edit</a>
                            <a href='function/management/delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this record PERMANENTLY?\");'>Delete</a>
                        </div>
                    </div>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='9' style='color: red;'>No records found.</td></tr>";
}

$conn->close();
?>
