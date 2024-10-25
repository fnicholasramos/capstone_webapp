<?php 
$server = "localhost";
$username = "root";
$password = "";
$db = "capstone";

$conn = new mysqli($server, $username, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}