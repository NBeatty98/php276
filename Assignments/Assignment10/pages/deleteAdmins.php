<?php

routeHome();

function init()
{

  require_once 'classes/Pdo_methods.php';

  if (isset($_POST['delete'])) {
    if (isset($_POST['chkbx'])) {
      $error = false;
      foreach ($_POST['chkbx'] as $id) {
        $pdo = new PdoMethods();

        $sql = "DELETE FROM admin WHERE ad_id=:ad_id";

        $bindings = [
          [':ad_id', $id, 'int'],
        ];


        $result = $pdo->otherBinded($sql, $bindings);

        if ($result === 'error') {
          $error = true;
          break;
        }
      }
    }
  }

  $output = "";

  $pdo = new PdoMethods();

  /* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
  $sql = "SELECT * FROM admin";

  $records = $pdo->selectNotBinded($sql);

  if (count($records) === 0) {
    $output = "<p>There are no records to display</p>";
    return [$output, ""];
  } else {
    $output = "<form method='post' action='index.php?page=deleteAdmins'>";
    $output .= "<input type='submit' class='btn btn-danger' name='delete' value='Delete'/><br><br><table class='table table-striped table-bordered'>
    <thead>
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Status</th>
        </tr>
    </thead><tbody>";

    foreach ($records as $row) {
      $output .= "<tr><td>{$row['ad_name']}</td>
        <td>{$row['ad_email']}</td>
        <td>{$row['ad_password']}</td>
        <td>{$row['ad_status']}</td>
        <td><input type='checkbox' name='chkbx[]' value='{$row['ad_id']}' /></td></tr>";
    }

    $output .= "</tbody></table></form>";

    if (isset($error)) {
      if ($error) {
        $msg = "<p>Could not delete the admin(s)</p>";
      } else {
        $msg = "<p>Admin(s) deleted</p>";
      }
    } else {
      $msg = "";
    }
    return [$msg, $output];
  }
}

?>