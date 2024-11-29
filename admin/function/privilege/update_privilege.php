<?php
// Include your database connection
require '../../db.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'update' button is pressed (which corresponds to a specific user ID)
    if (isset($_POST['update'])) {
        $userId = $_POST['update']; // Get the user ID from the button value
        if (isset($_POST['privilege'][$userId])) {
            $newPrivilege = $_POST['privilege'][$userId]; // Get the new privilege value for the user
            
            // Sanitize inputs to avoid SQL injection
            $userId = intval($userId); // Convert user ID to an integer
            $newPrivilege = htmlspecialchars($newPrivilege); // Escape the privilege value

            // SQL query to update the user's privilege
            $query = "UPDATE users SET privilege = ? WHERE id = ?";

            // Prepare the SQL statement
            if ($stmt = $conn->prepare($query)) {
                // Bind the parameters (new privilege, user ID)
                $stmt->bind_param('si', $newPrivilege, $userId);

                // Execute the statement
                if ($stmt->execute()) {
                    // Redirect back to the user list page with a success message
                    header("Location: ../../edit-privilege.php?message=Privilege updated successfully");
                    exit();
                } else {
                    echo "Error: Could not update the privilege.";
                }

                // Close the statement
                $stmt->close();
            } else {
                echo "Error: Could not prepare the query.";
            }
        }
    }
}

// Close the database connection
$conn->close();
?>
