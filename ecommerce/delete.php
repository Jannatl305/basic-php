<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $image = $_GET['image']; 

    if (!empty($image) && file_exists($image)) {
        unlink($image); // Delete the old image file
    }

    $sql = "DELETE FROM `eco` WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=deleted");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}



?>