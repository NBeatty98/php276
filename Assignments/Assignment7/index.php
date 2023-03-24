<?php
require_once 'fileUploadProc.php';

$fileUpload = new FileUploadProc;
if (isset($_POST["uploadFile"])) {
  $fileUpload->processFile();
}
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Assignment 7</title>

</head>

<body>
  <main class="container">
    <h1>File Upload</h1>
    <a href="showFile.php">Show File List</a>

    <p>
      <?php echo $fileUpload->getOutput(); ?>
    </p>

    <div>
      <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="fileName">File Name</label>
          <input type="text" class="form-control" name="fileName" id="fileName">
        </div>
        <div class="form-group">
          <label for="file">Your file:</label>
          <input type="file" name="file" id="file">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" name="uploadFile" value="Upload File" />
        </div>
      </form>
    </div>
  </main>
</body>

</html>