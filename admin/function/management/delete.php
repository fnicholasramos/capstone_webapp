<?php
include '../../db.php';

// Check if 'id' is passed in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);  // Sanitize the 'id' to ensure it's an integer

    // Prepare the delete SQL statement
    $sql = "DELETE FROM patient_management WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Execute the delete statement
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
        // Optionally, redirect to another page, e.g., the table display page
        header("Location: ../../management.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "No record selected for deletion.";
}

// Close the database connection
$conn->close();
?>
