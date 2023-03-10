<?php 
require_once 'directories.php';
$newDir = new Directories();
$output = $newDir->addFolder();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <title>Assignment 4</title>
</head>
<body>

    <main class="container">

    <form method="post" action="index.php">
    <h1>File and Directory Assignment</h1>

    <p>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.</p>

    <p><?php echo isset($output['message']) ? $output['message'] : ''; ?></p>
    <p><?php echo isset($output['path']) ? $output['path'] : ''; ?></p>

    <div class="form-row">
          <div class="col">
            <label for="folderName">Folder Name</label>
            <input type="text" class="form-control" name="folderName" id="folderName">
          </div>
    </div>

    <div class="form-row mb-3">
            <label for="namelist">File Content</label>
            <textarea style="height: 150px;" class="form-control mb-2"
                      id="fileContent" name="fileContent"></textarea>
    </div>
   
    <div class="form-group mt-4">
    <button type="submit" class="btn btn-primary" name="submitButton" id="submitButton">Submit</button>
    </div>  

    </form>

</body>
</html>