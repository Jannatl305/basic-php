<?php 
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $availability = $_POST['availability'];
    $photo = $_FILES['photo']['name'];
    $old_photo = $_POST['old_photo'];


   
   $targetDir = "uploads/";
   $targetFile = $targetDir . basename($photo);
   $tmp_name = $_FILES['photo']['tmp_name'];

   if (move_uploaded_file($tmp_name, $targetFile)) {
        $photo = $targetFile; // Use the full path for the database
        // If a new photo is uploaded, delete the old one
    if (!empty($old_photo) && file_exists($old_photo)) {
        unlink($old_photo); // Delete the old photo file
    }
        echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Correct query execution
    $sql = "UPDATE dm SET photo = '$photo', name = '$name', specialization = '$specialization', email = '$email', phone = '$phone', availability = '$availability' WHERE id = $id";

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