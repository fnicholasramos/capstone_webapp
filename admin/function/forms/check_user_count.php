<?php
include '../../db.php' ;

// Count the number of users in your database
$query = "SELECT COUNT(*) as user_count FROM users";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$user_count = $row['user_count'];

// Output the class name based on user count
if ($user_count > 2) {
    echo 'display-none'; // Hide the link if there are more than 3 users
} else {
    echo ''; // Do nothing if the user count is 3 or less
}
?>
