<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT image FROM eco WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    if ($result->num_rows>0){
        $row = mysqli_fetch_assoc($result);
        $image = $row['image'];
    }

    
    if (!empty($image) && file_exists($image)) {
        unlink($image); // Delete the old image file
    }

    $sql = "DELETE FROM `eco` WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=deleted");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}



?>