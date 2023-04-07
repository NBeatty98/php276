<?php

require_once 'Pdo_methods.php';

class Date_time extends PdoMethods
{


  function checkSubmit()
  {

    $time_stamp_str = isset($_POST['dateTime']) ? $_POST['dateTime'] : '';
    $time_stamp = strtotime($time_stamp_str);
    $user_note = isset($_POST['note']) ? $_POST['note'] : '';

    if (!$time_stamp || !$user_note) {
      return "You must enter a date, time, and a note";
    }

    $pdo = new PdoMethods();
    $sql = "INSERT INTO date_time (time_stamp, user_note) VALUES (:fltime, :flnote)";
    $bindings = [
      [':fltime', $time_stamp, 'str'],
      [':flnote', $user_note, 'str']
    ];
    $result = $pdo->otherBinded($sql, $bindings);

    if ($result === 'error') {
      return 'There was an error adding the note';
    } else {
      return 'Note has been added';
    }
  }

  function checkDisplay()
  {
    $tableData = "";
    $begDate = isset($_POST['begDate']) ? $_POST['begDate'] : '';
    $begDateStamp = strtotime($begDate);
    $endDate = isset($_POST['endDate']) ? $_POST['endDate'] : '';
    $endDateStamp = strtotime($endDate);

    $pdo = new PdoMethods();

    $sql = "SELECT time_stamp, user_note FROM date_time WHERE time_stamp BETWEEN :begDate AND :endDate";
    $bindings = [
      [':begDate', $begDateStamp, 'int'],
      [':endDate', $endDateStamp, 'int']
    ];
    $result = $pdo->selectBinded($sql, $bindings);

    if ($result === 'error') {
      return 'There was an error retrieving the notes';
    } else {
      if (is_array($result)) {
        foreach ($result as $row) {
          $time_stamp = date("m/d/Y h:i a", $row['time_stamp']);
          $tableData .= "<tr><td>{$time_stamp}</td><td>{$row['user_note']}</td></tr>";
        }
        $tableData = "<table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th scope='col'>Date and Time</th>
                                    <th scope='col'>Note</th>
                                </tr>
                            </thead>
                            <tbody>{$tableData}</tbody>
                          </table>";
      }
      if (empty($result)) {
        $tableData = "<p>No notes found for the date range selected</p>";
      }
      return $tableData;
    }
  }
}