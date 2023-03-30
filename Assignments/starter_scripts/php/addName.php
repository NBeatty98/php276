<?php

require_once "../classes/Pdo_methods.php";

$data = json_decode($_POST['data']);

$fullname = $data->name;
$splitName = explode(" ", $fullname);
$lastname = array_pop($splitName);
$firstname = implode(" ", $splitName);
$newName = $lastname . ", " . $firstname;

$pdo = new PdoMethods();
$sql = "INSERT INTO names (name) VALUES (:flname)";
$bindings = [
  [':flname', $newName, 'str']
];
$result = $pdo->otherBinded($sql, $bindings);

if ($result === 'error') {
  $response = (object) [
    'masterstatus' => 'error',
    'msg' => "There was an error entering the name"
  ];
} else {
  $response = (object) [
    'masterstatus' => 'success',
    'msg' => "Name has been added"
  ];
}
echo json_encode($response);
?>