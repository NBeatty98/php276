<?php

require_once "../classes/Pdo_methods.php";

$pdo = new PdoMethods();
$sql = "SELECT * FROM names";
$records = $pdo->selectNotBinded($sql);

if ($records == 'error') {
  $response = (object) [
    'masterstatus' => 'error',
    'msg' => 'Could not read file',
  ];
  echo json_encode($response);

  exit;
}

$records = json_encode($records);
$records = json_decode($records);
$i = 0;
$j = 0;
$listArr = array();
$listStr = "";

while ($i < count($records)) {
  $listArr[] = $records[$i]->name;
  $i++;
}

sort($listArr);

while ($j < count($listArr)) {
  $listStr .= '<p>' . $listArr[$j] . '</p>';
  $j++;
}

$response = (object) [
  'masterstatus' => 'success',
  'names' => $listStr,
];

echo json_encode($response);
?>