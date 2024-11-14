<?php
include '../../db.php';

$device_id = $conn->real_escape_string($_POST['device_id']);
$patient_name = $conn->real_escape_string($_POST['name']);
$room_number = $conn->real_escape_string($_POST['room']);
$date_of_birth = $conn->real_escape_string($_POST['birth']);
$admit_date = $conn->real_escape_string($_POST['admit_date']);
$admit_time = $conn->real_escape_string($_POST['admit_time']);

// Insert the data into the patients table
$sql = "INSERT INTO patient_management (patient_name, room_number, date_of_birth, admit_date, admit_time, device_id) 
        VALUES ('$patient_name', '$room_number', '$date_of_birth', '$admit_date', '$admit_time', '$device_id')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../../management.php"); 
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>