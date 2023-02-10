<?php

$table = "<table border=1>";
$i =1;


while ($i<=15){
    $table .= "<tr>";
    $j =1;
    while($j<=5){
        $table .= "<td>Row ".$i." Cell ".$j."</td>";
        $j++;
    }
    $i++;
    $table .= "</tr>";
}

$table .= "</table>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise3</title>
</head>
<body>
    <p><?php echo $table; ?></p>

</body>
</html>