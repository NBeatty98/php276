<?php
require_once 'classes/Date_time.php';
$dt = new Date_time();
$notes = "";
if (isset($_POST["addNoteButton"])) {
  $notes = $dt->checkSubmit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Add Note</title>
</head>

<body>
  <main class="container">

    <form method="post">
      <h1>Add Note</h1>

      <a href='displayNote.php'>Display Notes</a>
      <p>
        <?php echo $notes ?>
      </p>

      <div class="form-row">
        <label for="dataTime">Date and Time</label>
        <input type="datetime-local" class="form-control" id="dataTime" name="dateTime">
      </div>

      <div class="form-row">
        <div class="col pt-3">
          <label for="note">Note</label>
          <textarea style="height: 500px;" class="form-control" id="note" name="note"></textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="pt-3">
          <button type="submit" class="btn btn-primary" name="addNoteButton" id="addNoteButton">Add Note</button>
        </div>
      </div>

    </form>
  </main>
</body>

</html>