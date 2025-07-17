<?php 
include 'config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE dm SET status = '1' WHERE id = $id";
    if ($conn->query($sql) == true) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>