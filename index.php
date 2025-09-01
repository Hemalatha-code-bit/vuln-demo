<?php
require_once 'config.php';

// Get user input safely
$q = isset($_GET['q']) ? $_GET['q'] : '';

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $q); // "s" = string
$stmt->execute();
$result = $stmt->get_result();

// Output results safely (prevent XSS)
while ($row = $result->fetch_assoc()) {
    echo "<li>" . htmlspecialchars($row['username']) . " - " . htmlspecialchars($row['bio']) . "</li>";
}

$stmt->close();

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
