<?php
for ($i = 2; $i <= 5; $i++) {
    echo $i . " ";
}
echo "<br>";
$i = 1;
while ($i <= 5) {
    echo $i . " ";
    $i++;
}
echo "<br>";
$nomes = ["Moni", "Risha", "Zihad", "Jubayer"];

foreach ($nomes as $name) {
    echo $name . " ";
}

?>