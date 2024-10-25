<?php
include 'db.php';

// SQL query to retrieve patient data
$sql = "SELECT patient_name, room_number, date_of_birth, admit_date, admit_time FROM patient_management";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Loop through each row and create table cells
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['patient_name']}</td>
                <td>{$row['room_number']}</td>
                <td>{$row['date_of_birth']}</td>
                <td>{$row['admit_date']}</td>
                <td>{$row['admit_time']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6' style='color: red;'>No records found.</td></tr>";
}

// Close the connection
$conn->close();
?>
