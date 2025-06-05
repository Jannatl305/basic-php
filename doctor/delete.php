<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE dm SET status = '0' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=deleted");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}