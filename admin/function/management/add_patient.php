<?php
include '../../db.php';

$id = $conn->real_escape_string($_POST['id']);
$patient_name = $conn->real_escape_string($_POST['name']);
$date_of_birth = $conn->real_escape_string($_POST['birth']);
$admit_date = $conn->real_escape_string($_POST['admit_date']);
$admit_time = $conn->real_escape_string($_POST['admit_time']);

// Insert the data into the patients table
$sql = "INSERT INTO patient_management (patient_name, date_of_birth, admit_date, admit_time) 
        VALUES ('$patient_name', '$date_of_birth', '$admit_date', '$admit_time')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../../management.php"); 
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>