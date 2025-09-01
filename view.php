<?php
// view.php - reflected XSS example
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>
<!doctype html>
<html><body>
  <h1>Message Viewer</h1>
  <div>Message: <?php echo htmlspecialchars($msg, ENT_QUOTES, 'UTF-8'); ?></div>
  <p><a href="index.php">Home</a></p>
</body></html>
