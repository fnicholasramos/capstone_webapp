<?php
include '../../db.php';

// Check if the form was submitted and required parameters are present
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $patient_name = $_POST['patientName'];
    $diagnose = $_POST['diagnose'];
    $device = $_POST['device'];
    $room_number = $_POST['room'];
    $iv_fluid = $_POST['iv_fluid'];
    $flow_rate = $_POST['flow_rate'];
    $answer = $_POST['answer'];

    $drop_factor = $_POST['drop_factor'];
    $minutes = $_POST['minutes'];
    $drip_rate_answer = $_POST ['drip_rate_answer'];

    $volume = $_POST['volume'];
    $incorporation = $_POST['incorporation'];
    $ivf_no = $_POST['ivf_no'];
    $date_started = $_POST['date_started'];
    $time_started = $_POST['time_started'];
    $date_consumed = $_POST['date_consumed'];
    $time_consumed = $_POST['time_consumed'];
    $nurse = $_POST['nurse'];


    if (!empty($drip_rate_answer)) {
        $sql .= ", drip_rate_answer = '$drip_rate_answer'";
    }
    
    $sql .= " WHERE id = $id";
    // echo "ID: $id, Name: $patient_name, IVF: $iv_fluid, Volume: $volume, Incorporation: $incorporation, IVF Number: $ivf_no, Date Started: $date_started, Time Started: $time_started Date Consume: $date_consumed, Time Consumed: $time_consumed, Nurse: $nurse";

    // Prepare the SQL query to update patient data
    $sql = "UPDATE doc_orders SET 
                patient_name = '$patient_name', 
                diagnose = '$diagnose', 
                room_number = '$room_number',
                iv_fluid_name = '$iv_fluid',
                volume = '$volume',
                flow_rate = '$flow_rate',
                answer = '$answer',
                
                drop_factor = '$drop_factor',
                minutes = '$minutes',
                drip_rate_answer = CASE 
                WHEN '$drip_rate_answer' != '' THEN '$drip_rate_answer' 
                    ELSE drip_rate_answer 
                END,

                incorp = '$incorporation',
                ivf_no = '$ivf_no',
                date_started = '$date_started',
                time_started = '$time_started',
                date_consumed = '$date_consumed',
                time_consumed = '$time_consumed',
                nurse = '$nurse',
                device_id = '$device'
            WHERE id = $id";

    // echo $sql; // Show the final SQL query for debugging

    if ($conn->query($sql) === TRUE) {
        // echo "Record updated.";
        header("Location: ../../monitoring.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
