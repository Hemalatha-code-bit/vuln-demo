<?php
// config.php - intentionally insecure: hard-coded credentials / secret

// Hard-coded DB credentials (bad)
$db_host = "localhost";
$db_user = "root";
$db_pass = "rootpassword";   // <- SENSITIVE: secret scanning should flag this
$db_name = "vulndb";

// Hard-coded API key (demo secret - DO NOT USE IN REAL APPS)
define('THIRD_PARTY_API_KEY', 'AKIAEXAMPLEKEY1234567890'); // <- secret scanner target

// Connect (no error handling)
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
?>
