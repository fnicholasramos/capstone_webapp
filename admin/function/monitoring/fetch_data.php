<?php
include '../../db.php';

// The SQL query now includes a condition to filter out discharged patients (where discharged = 0)
$sql = "SELECT do.id, 
               do.patient_name, 
               do.diagnose, 
               do.device_id, 
               do.room_number, 
               do.iv_fluid_name, 
               do.volume, 
               do.flow_rate, 
               do.answer, 
               do.drop_factor,
               do.minutes,
               do.drip_rate_answer,
               do.incorp, 
               do.ivf_no, 
               do.date_started, 
               do.time_started, 
               do.date_consumed, 
               do.time_consumed, 
               do.nurse, 
               iv.device_id AS iv_device_id, iv.liter, iv.percent 
        FROM doc_orders do 
        LEFT JOIN iv_data iv ON do.device_id = iv.device_id 
        WHERE do.discharged = 0  -- Filter out discharged patients
        ORDER BY do.id DESC";  // Fetch the latest records

$result = $conn->query($sql);
$data = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
$conn->close();
?>
