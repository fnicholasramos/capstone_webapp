<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Set the content type to JSON, since the ESP32 is likely sending JSON data
header("Content-Type: application/json");

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$database = "capstone";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read and parse the incoming POST request
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['device_id']) && isset($data['liter']) && isset($data['percent'])) {
    $device_id = $data['device_id'];
    $liter = $data['liter'];
    $percent = $data['percent'];

    // Begin a transaction
    $conn->begin_transaction();

    try {
        // Update or insert into iv_data
        $stmt = $conn->prepare("INSERT INTO iv_data (device_id, liter, percent) VALUES (?, ?, ?) 
                                ON DUPLICATE KEY UPDATE liter = VALUES(liter), percent = VALUES(percent)");
        $stmt->bind_param("sii", $device_id, $liter, $percent);
        $stmt->execute();
        $stmt->close();

        // Insert into iv_history
        $historyStmt = $conn->prepare("INSERT INTO iv_history (device_id, liter, percent) VALUES (?, ?, ?)");
        $historyStmt->bind_param("sii", $device_id, $liter, $percent);
        $historyStmt->execute();
        $historyStmt->close();

        // Commit the transaction
        $conn->commit();
        echo json_encode(["message" => "Data received and history recorded!"]);
    } catch (Exception $e) {
        // Rollback in case of error
        $conn->rollback();
        http_response_code(500);
        echo json_encode(["error" => "Transaction failed: " . $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid data"]);
}


$conn->close();
?>
