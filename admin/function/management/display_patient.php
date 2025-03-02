<?php
include 'db.php';

$sql = "SELECT id, patient_name, date_of_birth, admit_date, admit_time
        FROM patient_management
        ORDER BY id DESC";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['patient_name']}</td>
                <td>{$row['date_of_birth']}</td>
                <td>{$row['admit_date']}</td>
                <td>{$row['admit_time']}</td>";

        // Add privilege check outside of the echoed string
        if (isset($_SESSION['privilege']) && $_SESSION['privilege'] === 'admin') {
            echo "<td style='text-align:center;'>
                    <div class='dropdown' style='text-align:left;'>
                        <button class='dropdown-button' onclick='toggleDropdown(event)'>Select &#11206;</button>
                        <div class='dropdown-menu'>
                            <a href='#' onclick=\"openEditModal(
                                '{$row['id']}',
                                '{$row['patient_name']}', 
                                '{$row['date_of_birth']}', 
                                '{$row['admit_date']}', 
                                '{$row['admit_time']}'
                            )\">Edit</a>
                            <a href='function/management/delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this record PERMANENTLY?\");'>Delete</a>
                        </div>
                    </div>
                  </td>";
        }

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5' style='color: red;'>No records found.</td></tr>";
}

$conn->close();
?>
