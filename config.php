<?php
// config.php - for testing secret scanning

$db_host = "localhost";
$db_user = "root";

// High-entropy password for testing Trufflehog detection
$db_pass = "p@$$w0rd1234567890!ABCDEfghijkLMNOPQRST";

// High-entropy API key for testing Trufflehog
define('THIRD_PARTY_API_KEY', 'AKIA1234567890ABCDEF1234567890XYZ');

// Database connection
$conn = new mysqli($db_host, $db_user, $db_pass, 'testdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
