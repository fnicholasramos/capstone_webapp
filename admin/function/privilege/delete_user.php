<?php
// Include your database connection
require '../../db.php';

// Check if the 'id' parameter is passed in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $userId = $_GET['id'];

    // Sanitize the input to avoid SQL injection
    $userId = intval($userId);  // Convert to integer

    // Delete the user from the database
    $query = "DELETE FROM users WHERE id = ?";
    
    // Prepare the SQL statement
    if ($stmt = $conn->prepare($query)) {
        // Bind the parameter (user ID)
        $stmt->bind_param('i', $userId);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the user list or a success page after deletion
            header("Location: ../../edit-privilege.php?message=User deleted successfully");
            exit();
        } else {
            // Handle failure (e.g., database error)
            echo "Error: Could not delete user.";
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Handle prepare statement failure
        echo "Error: Could not prepare the query.";
    }
} else {
    // If 'id' is not passed, show an error message
    echo "Error: User ID not specified.";
}

// Close the database connection
$conn->close();
?>
