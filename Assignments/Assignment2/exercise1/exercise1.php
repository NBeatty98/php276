<?php 

$i =1;
$string = "<ul>";

while($i <=4){
$string .= "<li>".$i;
$j =1;
    while($j<=5){
        $string.="<ul>"."<li>".$j."</li>"."</ul>";
        $j++;
    }

$i++;
$string.="</li>";
}
$string.="</ul>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercise1</title>
</head>
<body>

    <p><?php echo $string; ?></p>

</body>
</html>