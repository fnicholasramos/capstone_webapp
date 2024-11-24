<?php
// Database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'capstone';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch usernames for the dropdown
$sql = "SELECT id, username FROM users";
$result = $conn->query($sql);

// Check if the form was submitted to update user data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $userId = $_POST['user_id'];
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];

    // Update the username and email
    $updateSql = "UPDATE users SET username = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("ssi", $newUsername, $newEmail, $userId);
    $stmt->execute();
    echo "User updated successfully!";
}

// Fetch the current user's username and email if a user is selected
$currentUsername = '';
$currentEmail = '';
if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    $sqlUser = "SELECT username, email FROM users WHERE id = ?";
    $stmt = $conn->prepare($sqlUser);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($currentUsername, $currentEmail);
    $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>

    <!-- Dropdown to select user -->
    <form method="GET" action="">
        <label for="user_id">Choose a user:</label>
        <select name="user_id" id="user_id" onchange="this.form.submit()">
            <option value="">--Select--</option>
            <?php
            while ($row = $result->fetch_assoc()) {
                $selected = (isset($_GET['user_id']) && $_GET['user_id'] == $row['id']) ? 'selected' : '';
                echo "<option value='{$row['id']}' $selected>{$row['username']}</option>";
            }
            ?>
        </select>
    </form>

    <!-- Display and edit user info -->
    <?php if (isset($currentUsername)): ?>
        <form method="POST" action="">
            <input type="hidden" name="user_id" value="<?php echo $userId; ?>">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $currentUsername; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $currentEmail; ?>" required><br>

            <button type="submit" name="update">Update User</button>
        </form>
    <?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>
