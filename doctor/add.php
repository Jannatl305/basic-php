<?php 
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $availability = $_POST['availability'];
    $photo = $_FILES['photo']['name'];


   
   $targetDir = "uploads/";
   $targetFile = $targetDir . basename($photo);
   $tmp_name = $_FILES['photo']['tmp_name'];

   if (move_uploaded_file($tmp_name, $targetFile)) {
        $photo = $targetFile; // Use the full path for the database
        echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
   


    // Correct query execution
    $sql = "INSERT INTO dm (photo, name, specialization, email, phone, availability) 
            VALUES ('$photo', '$name', '$specialization', '$email', '$phone', '$availability')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
// Ensure the database connection is closed
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Doctor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'form.php'; ?>
</body>
</html>