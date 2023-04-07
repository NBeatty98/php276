<?php
require_once 'classes/Date_time.php';
$dt = new Date_time();
$tableData = "";
if (isset($_POST["getNoteButton"])) {
  $tableData = $dt->checkDisplay();
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
  <title>Display Note</title>
</head>

<body>
  <main class="container">
    <form method="post">
      <h1>Display Note</h1>

      <a href='addNote.php'>Add Notes</a>

      <div class="form-row">
        <label for="begDate">Beginning Date</label>
        <div class='input-group date' id='datetimepicker1'>
          <input type="date" class="form-control" id="begDate" name="begDate">
        </div>

        <label for="endDate">End Date</label>
        <div class='input-group date' id='datetimepicker1'>
          <input type="date" class="form-control" id="endDate" name="endDate">
        </div>
      </div>

      <div class="form-group">
        <div class="pt-3">
          <button type="submit" class="btn btn-primary" name="getNoteButton" id="getNoteButton">Get Notes</button>
        </div>
      </div>

      <div>
        <?php echo $tableData ?>
      </div>

    </form>
  </main>
</body>

</html>