<?php
// Fetch user details by user ID
$userId = $_GET['userId'];

$servername = "localhost";
$username = "root";
$password = "your_password";
$dbname = "userDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT age, dob, contact FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);

$stmt->execute();
$result = $stmt->get_result();
$userDetails = $result->fetch_assoc();

echo json_encode($userDetails);

$stmt->close();
$conn->close();
?>
