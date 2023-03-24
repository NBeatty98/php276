<?php
require_once 'myCrud.php';
$crud = new Crud();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>List Files</title>
</head>
<main class="container">
  <h1>List Files</h1>

  <body>
    <a href="index.php">Add File</a>
    <p>
      <?php echo $crud->getFiles('list'); ?>
    </p>
</main>
</body>

</html>