<?php
include '../../db.php';

// Retrieve and sanitize form data
$patientName = filter_input(INPUT_POST, 'patientName', FILTER_SANITIZE_STRING);
$room = filter_input(INPUT_POST, 'room', FILTER_SANITIZE_STRING);
$iv_fluid = filter_input(INPUT_POST, 'iv_fluid', FILTER_SANITIZE_STRING);
$volume = filter_input(INPUT_POST, 'volume', FILTER_VALIDATE_FLOAT);
$flow_rate = filter_input(INPUT_POST, 'flow_rate', FILTER_VALIDATE_FLOAT);
$answer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_STRING);
$drop_factor = filter_input(INPUT_POST, 'drop_factor', FILTER_VALIDATE_FLOAT);
$minutes = filter_input(INPUT_POST, 'minutes', FILTER_VALIDATE_INT);
$drip_rate_answer = filter_input(INPUT_POST, 'drip_rate_answer', FILTER_VALIDATE_FLOAT);
$incorporation = filter_input(INPUT_POST, 'incorporation', FILTER_SANITIZE_STRING);
$ivf_no = filter_input(INPUT_POST, 'ivf_no', FILTER_SANITIZE_STRING);
$date_started = filter_input(INPUT_POST, 'date_started', FILTER_SANITIZE_STRING);
$time_started = filter_input(INPUT_POST, 'time_started', FILTER_SANITIZE_STRING);
$date_consumed = filter_input(INPUT_POST, 'date_consumed', FILTER_SANITIZE_STRING);
$time_consumed = filter_input(INPUT_POST, 'time_consumed', FILTER_SANITIZE_STRING);
$nurse = filter_input(INPUT_POST, 'nurse', FILTER_SANITIZE_STRING);
$device = filter_input(INPUT_POST, 'device', FILTER_SANITIZE_STRING);

// Prepare the SQL statement
$sql = "INSERT INTO doc_orders 
        (patient_name, room_number, iv_fluid_name, volume, flow_rate, answer, drop_factor, minutes, 
         drip_rate_answer, incorp, ivf_no, date_started, time_started, date_consumed, time_consumed, nurse, device_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters
$stmt->bind_param(
    "sssdddsddssssssss", 
    $patientName, 
    $room, 
    $iv_fluid,  
    $volume, 
    $flow_rate, 
    $answer, 
    $drop_factor, 
    $minutes, 
    $drip_rate_answer, 
    $incorporation, 
    $ivf_no, 
    $date_started, 
    $time_started, 
    $date_consumed, 
    $time_consumed, 
    $nurse, 
    $device
);

// Execute the statement
if ($stmt->execute()) {
    header("Location: ../../orders.php?status=success");
    exit();
} else {
    die("Error executing statement: " . $stmt->error);
}

// Close connections
$stmt->close();
$conn->close();