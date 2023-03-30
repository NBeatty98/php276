<?php
require_once "../classes/Pdo_methods.php";

$pdo = new PdoMethods();
$sql = "TRUNCATE TABLE names";
$result = $pdo->otherNotBinded($sql);

if ($result === 'error') {
  $response = (object) [
    'masterstatus' => 'error',
    'msg' => 'Could not clear table',
  ];
  echo json_encode($response);
} else {
  $response = (object) [
    'masterstatus' => 'success',
    'msg' => 'Table cleared',
  ];
  echo json_encode($response);
}
?>