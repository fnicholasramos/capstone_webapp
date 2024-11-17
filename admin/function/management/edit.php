<?php
include '../../db.php';

// Check if the form was submitted and required parameters are present
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $patient_name = $_POST['patient_name'];
    // $room_number = $_POST['room_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $admit_date = $_POST['admit_date'];
    $admit_time = $_POST['admit_time'];

    // Prepare the SQL query to update patient data
    $sql = "UPDATE patient_management SET 
                patient_name = '$patient_name', 
                date_of_birth = '$date_of_birth', 
                admit_date = '$admit_date', 
                admit_time = '$admit_time' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Patient record updated successfully!";
        header("Location: ../../management.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
