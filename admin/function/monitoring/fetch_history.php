<?php
include '../../db.php';

$device_id = $_GET['device_id'] ?? null;

if ($device_id) {
    $stmt = $conn->prepare("SELECT device_id, liter, percent, recorded_at FROM iv_history WHERE device_id = ? ORDER BY recorded_at DESC");
    $stmt->bind_param("s", $device_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $history = [];

    while ($row = $result->fetch_assoc()) {
        $history[] = $row;
    }

    echo json_encode($history);
    $stmt->close();
} else {
    http_response_code(400);
    echo json_encode(["error" => "Device ID is required"]);
}

$conn->close();
?>
