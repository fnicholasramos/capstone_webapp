<?php
include '../../db.php';

$sql = "SELECT pm.id, pm.patient_name, pm.room_number, pm.date_of_birth, pm.admit_date, pm.admit_time,
               iv.device_id, iv.liter, iv.percent 
        FROM patient_management pm 
        LEFT JOIN iv_data iv ON pm.device_id = iv.device_id 
        ORDER BY pm.id DESC";

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
