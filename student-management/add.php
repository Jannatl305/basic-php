<?php include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name']; $email = $_POST['email'];
    $phone = $_POST['phone']; $course = $_POST['course'];

    $conn->query("INSERT INTO students (name, email, phone, course) 
                  VALUES ('$name', '$email', '$phone', '$course')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Add Student</h2>
    <form method="POST">
        <input class="form-control mb-2" type="text" name="name" placeholder="Name" required>
        <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
        <input class="form-control mb-2" type="text" name="phone" placeholder="Phone">
        <input class="form-control mb-2" type="text" name="course" placeholder="Course">
        <button class="btn btn-primary" type="submit">Add</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
