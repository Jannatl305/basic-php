<?php
function cal($main_price, $dis_price) {
    global $total_price;
    $total_price = ($main_price * $dis_price) / 100;
    return $total_price;
}

cal(1000, 10);
echo $total_price;
?>

<?php
function scop($name){
    echo "My name is $name.";
}
scop("Moni");

define("PI", 3.14159);
echo PI; 
echo "The value of PI is: " . PI . "<br>"; 
echo "The value of PI is: " . constant("PI") . "<br>"; 

echo "". constant("") . rad2deg(0)
?>