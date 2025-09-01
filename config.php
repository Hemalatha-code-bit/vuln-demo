<?php
// config.php - secure version

// Load secrets from environment variables
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASSWORD') ?: '';
$database = getenv('DB_NAME') ?: 'testdb';

// High-entropy API key from environment
define('THIRD_PARTY_API_KEY', getenv('API_KEY') ?: '');

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $database);

// Handle connection errors securely (do not reveal details to users)
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error); // log internally
    die("Database connection failed."); // generic message for users
}
?>
