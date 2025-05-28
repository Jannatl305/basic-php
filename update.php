<?php 
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $availability = $_POST['availability'];

    // Correct query execution
    $sql = "UPDATE dm SET photo = NULL, name = '$name', specialization = '$specialization', email = '$email', phone = '$phone', availability = '$availability' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=updated");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>