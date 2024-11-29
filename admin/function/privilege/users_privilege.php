<?php
include 'db.php'; 

$sql = "SELECT id, username, privilege FROM users";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row; // Store each row in the $users array
    }
}

$conn->close(); // Close the connection
?>
