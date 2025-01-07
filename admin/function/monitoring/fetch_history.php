<?php
// Include the database connection
include '../../db.php';

// Set headers to return JSON and handle CORS if needed
header('Content-Type: application/json');

// Retrieve the device_id from the query parameter
$device_id = $_GET['device_id'] ?? null;

if ($device_id) {
    // Prepare the SQL statement to fetch history data
    $stmt = $conn->prepare("
        SELECT device_id, liter, percent, recorded_at 
        FROM iv_history 
        WHERE device_id = ? 
        ORDER BY recorded_at DESC
    ");

    // Bind the parameter and execute the query
    $stmt->bind_param("s", $device_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Initialize an array to store the history data
    $history = [];

    // Fetch all rows and store them in the array
    while ($row = $result->fetch_assoc()) {
        $history[] = $row;
    }

    // Check if history data is empty and return appropriate response
    if (!empty($history)) {
        echo json_encode($history);
    } else {
        http_response_code(404); // Not Found
        echo json_encode(["error" => "No history found for the given device ID"]);
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Handle the case where device_id is not provided
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Device ID is required"]);
}

// Close the database connection
$conn->close();
?>
