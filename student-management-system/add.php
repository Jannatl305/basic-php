<?php include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $school = $_POST['school'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $conn->query("INSERT INTO students (name, school, class, email, phone, course) 
                  VALUES ('$name', '$school', '$class', '$email', '$phone', '$course')");
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
    <?php include 'form.php';?>
</body>
</html>
