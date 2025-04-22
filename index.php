<?php
echo"hello";
?>

?<?php
$a=18;
$b=6;
$a *= $b;
echo $a;
echo "<br>";
var_dump($a);
echo "<br>";
echo $a===$b;
echo "<br>";
var_dump($a==$b);
echo "<br>";
var_dump($a!=$b);
echo "<br>";
$list1 = array("a" => "Red" , "b" => "Green", "c" => "Blue");
echo $list1['a'];
echo "<br>";
$list2 = array("d" => "Purple", "e" => "Yellow", "f" => "Pink");
// $list3 = $list1 + $list2;
// print_r($list3);
echo "<br>";
$list3 = array_merge($list1, $list2);
print_r($list3);
echo "<br>";
var_dump($list1==$list2);
echo "<br>";
var_dump($list1!=$list2);

function add($a , $b){
    return $a + $b;
}
echo add(5,10);
echo "<br>";
$age=18;
$name="Moni";
if($age>=18 and $name=="Moni"){
    echo "You are eligible to vote";
}
else{
    echo "You are not eligible to vote";
}
echo "<br>";

foreach($list3 as $key => $value){
    echo $key . " = " . $value ."<br>";
}
echo "<br>";
for ($m = 1; $m <=10; $m++){
    echo $m . ". My name is Moni<br>";
}
echo "<br>";
while ($a > 0) {
    echo $a . " ";
    $a--;
}
echo "<br>";
do {
    echo $b . " ";
    $b++;
} while ($b < 10);
echo "<br>";
echo "<br>";
class first_one{
    public $name = "Moni";
    public $age = 18;

    public function get_class_info(){
        echo "Hi! I am " . $this->name . " and I am  " . $this->age . " years old.";
    }
}

$fiesr_object = new first_one();

$fiesr_object->name = "Moni";
$fiesr_object->age = 18;

$fiesr_object->get_class_info();
?> 

<?php
 $moni = array ("Moni" , "Mostakim" , "Hasan" , "Sumaiya" , "Amina");
 foreach ($moni as $nam){
    echo "My name is " .$nam. "<br>";
    }
 ?>

 <?php
echo "Done for today";
 ?>