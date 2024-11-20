<?php
include '../../db.php';

$query = $_GET['query'] ?? '';

$sql = "SELECT DISTINCT patient_name FROM patient_management WHERE patient_name LIKE ?";
$stmt = $conn->prepare($sql);
$searchParam = '%' . $query . '%';
$stmt->bind_param("s", $searchParam);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="suggestion-item" onclick="selectPatient(\'' . addslashes($row['patient_name']) . '\')">' 
             . htmlspecialchars($row['patient_name']) 
             . '</div>';
    }
} else {
    echo '<div class="suggestion-item">No results found</div>';
}

$stmt->close();
$conn->close();
?>
