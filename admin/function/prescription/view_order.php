<?php
include 'db.php'; // Adjust the path to your db_connection.php file

// Fetch all prescriptions
$sql = "SELECT * FROM prescription ORDER BY id DESC"; // Latest records first
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output each row as an HTML structure
    while ($row = $result->fetch_assoc()) {
        echo '<div class="message" onclick="toggleDetails(this)">
                <div class="summary">
                    <strong>Patient:</strong> ' . $row['patient_name'] . ' | 
                    <strong>Room No:</strong> ' . $row['room_no'] . ' ';

        // Check if the user is an admin and include the delete button if true
        if (isset($_SESSION['privilege']) && $_SESSION['privilege'] === 'admin') {
            echo '<button class="delete-btn" onclick="deleteRow(event, ' . $row['id'] . ')">x</button>';
        }

        echo '</div>
                <div class="details hidden">
                    <p><strong>Diagnostic:</strong> ' . $row['diagnostic'] . '</p>
                    <p><strong>Device ID:</strong> ' . $row['device_id'] . '</p>
                    <p><strong>IV Fluid:</strong> ' . $row['iv_fluid'] . '</p>
                    <p><strong>Volume:</strong> ' . $row['volume'] . ' mL</p>
                    <p><strong>Per Hour:</strong> ' . $row['per_hour'] . ' hour(s)</p>
                    <p><strong>Drop Factor:</strong> ' . $row['drop_factor'] . '</p>
                    <p><strong>Per Minutes:</strong> ' . $row['per_minute'] . '</p>
                    <p><strong>Incorporation:</strong> ' . $row['incorporation'] . '</p>
                    <p><strong>IVF No:</strong> ' . $row['ivf_no'] . '</p>
                    <p><strong>Date Started:</strong> ' . $row['date_started'] . '</p>
                    <p><strong>Time Started:</strong> ' . $row['time_started'] . '</p>
                    <p><strong>Date to Consumed:</strong> ' . $row['date_to_consumed'] . '</p>
                    <p><strong>Time to Consumed:</strong> ' . $row['time_to_consumed'] . '</p>
                    <p><strong>Nurse on Duty:</strong> ' . $row['nurse_on_duty'] . '</p>
                </div>
              </div>';
    }
} else {
    echo '<div class="message">No records found.</div>';
}

$conn->close();
?>
