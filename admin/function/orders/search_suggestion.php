<?php
include '../../db.php';

// Get the search query
$query = $_GET['query'] ?? '';

// Prepare SQL to fetch matching patient names
$sql = "SELECT DISTINCT patient_name FROM patient_management WHERE patient_name LIKE ?";
$stmt = $conn->prepare($sql);
$searchParam = '%' . $query . '%';
$stmt->bind_param("s", $searchParam);
$stmt->execute();
$result = $stmt->get_result();

$output = '';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= '<div class="suggestion-item" onclick="selectSuggestion(\'' . $row['patient_name'] . '\')">' . $row['patient_name'] . '</div>';
    }
} else {
    $output = '<div class="suggestion-item" style="color: red;">No results found.</div>';
}

echo $output;

$stmt->close();
$conn->close();
?>