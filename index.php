<?php
// index.php - intentionally vulnerable to SQL injection and reflected XSS
require_once 'config.php';

$q = isset($_GET['q']) ? $_GET['q'] : '';

// VULNERABLE: building query with unsanitized input -> SQL Injection
$sql = "SELECT * FROM users WHERE username = '$q'";
$result = $conn->query($sql);

?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Vuln Demo</title></head>
<body>
  <h1>Search user</h1>
  <form method="get" action="index.php">
    <input name="q" value="<?php echo htmlspecialchars($q); ?>">
    <button type="submit">Search</button>
  </form>

  <h2>Results</h2>
  <ul>
  <?php
    if ($result) {
      while ($row = $result->fetch_assoc()) {
        // Stored XSS: bio is output without proper escaping
        echo "<li>" . $row['username'] . " - " . $row['bio'] . "</li>";
      }
    }
  ?>
  </ul>

  <p><a href="upload.php">Upload a file</a></p>
</body>
</html>
