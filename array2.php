<?php
$roll = 
[
    [
        "class-1" =>
        [
            "name" => "Moni",
            "age" => 20,
        ],
        "class-2" =>
        [
            "name" => "Risha",
            "age" => 21,
        ],
        "class-3" =>
        [
            "name" => "Zihad",
            "age" 
        ]   
    ]
];
?>
<table border ="1" width = "30%">
    <tr>
        <th>Class</th>
        <th>Name</th>
        <th>Age</th>
    </tr>
    <?php foreach($roll as $class) : ?>
        <?php foreach($class as $value => $val) : ?>
        <tr>
            <td><?php echo $value?></td>
            <td><?php echo $val["name"]?></td>
            <td><?php echo $val["age"]?></td>
        </tr>
        <?php endforeach ;?>
    <?php endforeach ;?>
</table>
<?php
var_dump($class);
echo "<hr>";
var_dump($value);
echo "<hr>";
var_dump($val);
echo "<hr>";
echo "I'm success😎"
?>