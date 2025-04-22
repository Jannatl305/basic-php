<?php
echo "hello world";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project1</title>
</head>
<body>
    <h1><?php echo "Hello World"?></h1>
</body>
</html>

<?php
$kitchen="Hello World";
var_dump($kitchen);
echo "<br>";
$new=5;
$good=3.567;
$help=true;
$hello=["moni" , 5 , 78.78 , true];

var_dump($new);
echo "<br>";
var_dump($good);
echo "<br>";
var_dump($help);
echo "<br>";
var_dump($hello);
?>

<?php
echo"<br>";
$a=5;
$b=3;
var_dump($a == $b);
echo"<br>";
var_dump($a != $b);
echo"<br>";
echo"<br>";
$a+=5;
echo $a;
?>