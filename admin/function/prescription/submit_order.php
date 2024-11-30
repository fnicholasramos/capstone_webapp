<?php 
include '../../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $patient_name = $_POST['patient_name'];
    $diagnostic = $_POST['diagnostic'];
    $room_no = $_POST['room_no'];
    $device_id = $_POST['device_id'];
    $iv_fluid = $_POST['iv_fluid'];
    $volume = $_POST['volume'];
    $per_hour = $_POST['per_hour'];
    $drop_factor = $_POST['drop_factor'];
    $per_minute = $_POST['per_minute'];
    $incorporation = $_POST['incorporation'];
    $ivf_no = $_POST['ivf_no'];
    $date_started = $_POST['date_started'];
    $time_started = $_POST['time_started'];
    $date_to_consumed = $_POST['date_to_consumed'];
    $time_to_consumed = $_POST['time_to_consumed'];
    $nurse_on_duty = $_POST['nurse_on_duty'];

    // Insert data into the database
    $sql = "INSERT INTO prescription (
        patient_name, diagnostic, room_no, device_id, iv_fluid, volume, per_hour, drop_factor,
        per_minute, incorporation, ivf_no, date_started, time_started, date_to_consumed,
        time_to_consumed, nurse_on_duty
    ) VALUES (
        '$patient_name', '$diagnostic', '$room_no', '$device_id', '$iv_fluid', $volume, $per_hour, $drop_factor,
        $per_minute, '$incorporation', $ivf_no, '$date_started', '$time_started', '$date_to_consumed',
        '$time_to_consumed', '$nurse_on_duty'
    )";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>