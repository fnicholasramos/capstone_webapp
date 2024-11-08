<?php
include '../../db.php';

// Check if the form was submitted and required parameters are present
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $patient_name = $_POST['patientName'];
    $iv_fluid = $_POST['iv_fluid'];
    $flow_rate = $_POST['flow_rate'];
    $volume = $_POST['volume'];
    $incorporation = $_POST['incorporation'];
    $ivf_no = $_POST['ivf_no'];
    $date_started = $_POST['date_started'];
    $time_started = $_POST['time_started'];
    $date_consumed = $_POST['date_consumed'];
    $time_consumed = $_POST['time_consumed'];
    $nurse = $_POST['nurse'];

    // echo "ID: $id, Name: $patient_name, IVF: $iv_fluid, Volume: $volume, Incorporation: $incorporation, IVF Number: $ivf_no, Date Started: $date_started, Time Started: $time_started Date Consume: $date_consumed, Time Consumed: $time_consumed, Nurse: $nurse";

    // Prepare the SQL query to update patient data
    $sql = "UPDATE doc_orders SET 
                patient_name = '$patient_name', 
                iv_fluid_name = '$iv_fluid',
                volume = '$volume',
                flow_rate = '$flow_rate',
                incorp = '$incorporation',
                ivf_no = '$ivf_no',
                date_started = '$date_started',
                time_started = '$time_started',
                date_consumed = '$date_consumed',
                time_consumed = '$time_consumed',
                nurse = '$nurse'
            WHERE id = $id";

    // echo $sql; // Show the final SQL query for debugging

    if ($conn->query($sql) === TRUE) {
        echo "Record updated.";
        // header("Location: ../../monitoring.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
