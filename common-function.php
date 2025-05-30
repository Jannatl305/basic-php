<?php
function my($array_table){
    global $db_table;
    $db_table= $array_table;
    return $db_table;
}
$db_table = 
[
    [
        "class1" => 
        [
            "name" => "Moni",
            "age" => 20,
        ],
        "class2" =>
        [
            "name" => "Lam",
            "age" => 25,
        ],
    ]
];
my($db_table);
?>
<table border="1" width="30%">
    <tr>
        <th>Class</th>
        <th>Name</th>
        <th>Age</th>
    </tr>
    <?php foreach($db_table as $class) : ?>
        <?php foreach($class as $value => $val) : ?>
            <tr>
                <td><?php echo $value ?></td>
                <td><?php echo $val["name"] ?></td>
                <td><?php echo $val["age"] ?></td>
            </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
</table> 

<?php
echo strlen("Hello, World!");
echo "<br>";
echo str_replace("world", "Moni", "Hello, world!");
echo "<br>";
echo str_repeat("Hello", 3);
echo "<br>";
echo str_pad("HELLO", 10, "0", STR_PAD_LEFT);
echo "<br>";
echo strtoupper("hello");
echo "<br>";
echo strtolower("HELLO");
echo "<br>";
echo ucfirst("hello world");
echo "<br>";
echo str_word_count("Hello, World!");
echo "<br>";
echo strrev("Hello, World!");
echo "<br>";
echo strpos("Hello, World!", "World");
echo "<br>";
echo strrpos("Hello, World!", "o");
echo "<br>";
echo str_shuffle("Hello, World!");
echo "<br>";
echo str_split("Hello, World!", 5);
echo "<br>";
echo strcasecmp("Hello", "hello");
echo "<br>";
echo str_ireplace("world", "Moni", "Hello, World!");
echo "<br>";
echo stristr("Hello, World!", "world");
?>