<?php
include '../../db.php';

// Decode the JSON data from the request
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id'])) {
    $id = $data['id'];
    // SQL to delete the record
    $sql = "DELETE FROM prescription WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
    $stmt->close();
} else {
    echo "invalid_request";
}

$conn->close();
?>