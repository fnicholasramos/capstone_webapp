<?php 
$server = "localhost";
$username = "root";
$password = "";
$db = "sakila";

$conn = new mysqli($server, $username, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search query
$query = $_GET['query'] ?? '';

// Prepare SQL to fetch matching patient names
$sql = "SELECT DISTINCT first_name FROM actor WHERE first_name LIKE ?";
$stmt = $conn->prepare($sql);
$searchParam = '%' . $query . '%';
$stmt->bind_param("s", $searchParam);
$stmt->execute();
$result = $stmt->get_result();

$output = '';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= '<div class="suggestion-item" onclick="selectSuggestion(\'' . $row['first_name'] . '\')">' . $row['first_name'] . '</div>';
    }
} else {
    $output = '<div class="suggestion-item" style="color: red;">No results found.</div>';
}

echo $output;

$stmt->close();
$conn->close();

?>