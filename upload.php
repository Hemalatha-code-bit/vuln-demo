<?php
// upload.php - insecure file upload handler
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // VULNERABLE: trusting client file name, no checks for mime/type, no randomized filename
    $target_dir = __DIR__ . '/uploads/';
    if (!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }

    $filename = basename($_FILES['file']['name']);
    $target_file = $target_dir . $filename;

    // Move uploaded file directly to web-accessible folder
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        echo "Uploaded: $filename";
    } else {
        echo "Upload failed";
    }
    exit;
}
?>
<!doctype html>
<html><body>
  <h1>Upload</h1>
  <form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button>Upload</button>
  </form>
  <p><a href="index.php">Back</a></p>
</body></html>
