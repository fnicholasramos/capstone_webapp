<?php
include '../../db.php';

date_default_timezone_set('Asia/Manila');

// Check if the ID is passed as a URL parameter
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Fetch the patient data from the `doc_orders` table
    $fetch_sql = "SELECT * FROM doc_orders WHERE id = $id";
    $result = $conn->query($fetch_sql);
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // current date today Format: YYYY-MM-DD
        $current_date = date('Y-m-d');         

        // current time today Format: 12-hour format with AM/PM
        $current_time_now = date('h:i A');

        // Insert the data into the `discharge` table using the foreign key `doc_order_id`
        $insert_sql = "INSERT INTO discharge (doc_order_id, admission_date, admission_time, discharge_date, discharge_time)
                       VALUES ($id, '{$row['date_started']}', '{$row['time_started']}', '$current_date', '$current_time_now')";

        if ($conn->query($insert_sql) === TRUE) {
            // Update the `discharged` flag in `doc_orders`
            $update_sql = "UPDATE doc_orders SET discharged = 1 WHERE id = $id";
            if ($conn->query($update_sql) === TRUE) {
                header("Location: ../../discharged.php");
            } else {
                echo "Error updating discharge status: " . $conn->error;
            }
        } else {
            echo "Error inserting record into discharge: " . $conn->error;
        }
    } else {
        echo "Patient record not found.";
    }
    
    // Close the database connection
    $conn->close(); 
} else {
    echo "Invalid request. Patient ID is missing.";
}
