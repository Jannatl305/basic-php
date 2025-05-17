<?php
include 'config.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name']; $email = $_POST['email'];
    $phone = $_POST['phone']; $course = $_POST['course'];

    $conn->query("UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Student</h2>
    <form method="POST">
        <input class="form-control mb-2" type="text" name="name" value="<?= $row['name'] ?>" required>
        <input class="form-control mb-2" type="email" name="email" value="<?= $row['email'] ?>" required>
        <input class="form-control mb-2" type="text" name="phone" value="<?= $row['phone'] ?>">
        <input class="form-control mb-2" type="text" name="course" value="<?= $row['course'] ?>">
        <button class="btn btn-primary" type="submit">Update</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
