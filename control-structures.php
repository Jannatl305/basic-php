<?php
$mark = 20;

if ($mark >= 15) {
    echo "You are pass.";
} else {
    echo "You are fail.";
}
echo "<br>";
$color = "red";

switch ($color) {
    case "red":
        echo "Stop!";
        break;
    case "green":
        echo "Go!";
        break;
    default:
        echo "Unknown color";
}
echo "<br>";
?>