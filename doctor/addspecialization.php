<?php 
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $specialization = $_POST['specialization'];
    $sql = "INSERT INTO specialization (specialization) VALUES ('$specialization')";
}
// Ensure the database connection is closed
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Specialization</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'specialization.php'; ?>
</body>
</html>