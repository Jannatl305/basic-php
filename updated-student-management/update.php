<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $school = $_POST['school'];
    $class = $_POST['class'];

    $sql = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course', school='$school', class='$class' WHERE id=$id";

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