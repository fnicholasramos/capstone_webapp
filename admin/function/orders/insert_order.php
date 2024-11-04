<?php
include '../../db.php';

// Retrieve form data
$patientName = $_POST['patientName'];
$iv_fluid = $_POST['iv_fluid'];
$volume = $_POST['volume'];
$flow_rate = $_POST['flow_rate'];
$incorporation = $_POST['incorporation'];
$ivf_no = $_POST['ivf_no'];
$date_started = $_POST['date_started'];
$time_started = $_POST['time_started'];
$date_consumed = $_POST['date_consumed'];
$time_consumed = $_POST['time_consumed'];
$nurse = $_POST['nurse'];

// Prepare and bind
$sql = "INSERT INTO doc_orders (patient_name, iv_fluid_name, volume, flow_rate, incorp, ivf_no, date_started, time_started, date_consumed, time_consumed, nurse) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error); // Display error if prepare fails
}

// Set all parameters to "s" since all columns are VARCHAR
$stmt->bind_param("sssssssssss", $patientName, $iv_fluid, $volume, $flow_rate, $incorporation, $ivf_no, $date_started, $time_started, $date_consumed, $time_consumed, $nurse);

// Execute the statement
if ($stmt->execute()) {
    header("Location: ../../orders.php?status=success"); 
    exit();
} else {
    echo "Error executing statement: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
