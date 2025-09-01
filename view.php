<?php
// view.php - reflected XSS example
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>
<!doctype html>
<html><body>
  <h1>Message Viewer</h1>
  <div>Message: <?php echo $msg; /* reflected XSS - intentionally unescaped */ ?></div>
  <p><a href="index.php">Home</a></p>
</body></html>
