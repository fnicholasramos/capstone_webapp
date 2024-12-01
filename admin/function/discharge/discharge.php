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

        // Insert the data into the `discharge` table
        $insert_sql = "INSERT INTO discharge (patient_name, diagnose, iv_fluid, admission_date, admission_time, discharge_date, discharge_time, ivf_no, nurse)
                       VALUES ('{$row['patient_name']}', '{$row['diagnose']}', '{$row['iv_fluid_name']}', '{$row['date_started']}', 
                                '{$row['time_started']}', '$current_date', '$current_time_now', '{$row['ivf_no']}', '{$row['nurse']}')";

        if ($conn->query($insert_sql) === TRUE) {

            // header("Location: ../../discharged.php");

            // Delete the record from `doc_orders`
            $delete_sql = "DELETE FROM doc_orders WHERE id = $id";
            if ($conn->query($delete_sql) === TRUE) {
                header("Location: ../../discharged.php");
            } else {
                echo "Error deleting record: " . $conn->error;
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
