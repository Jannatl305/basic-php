<?php
$practice = [
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
                "age" => 22,
            ],
        

             "class-4" => 
            [
                "name" => "Jubayer",
                "age" => 23,
            ],
        ]
];
?>
<hr>
<table border="1" width="30%">
    <tr>
        <th>Class</th>
        <th>Name</th>
        <th>Age</th>
    </tr>
     <?php foreach($practice as $class) : ?>
     <?php foreach($class as $value => $val) : ?>
        <tr>
            <td><?php echo [$class] ?></td>
            <td><?php echo $val["name"] ?></td>
            <td><?php echo $val["age"] ?></td>
        </tr>
        <?php endforeach; ?> 
        <?php endforeach; ?> 
</table>

<?php
var_dump($class);
echo "<br>";
var_dump($value);
echo "<br>";
var_dump($val);
?>