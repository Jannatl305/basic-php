<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No student found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
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
    <h2 class="mb-4">Edit Student Information</h2>
    <form action="update.php" method="POST" class="border p-4 rounded bg-light">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="school" class="form-label">School</label>
            <input type="text" class="form-control" id="school" name="school" value="<?php echo $row['school']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="class" class="form-label">Class</label>
            <input type="number" class="form-control" id="class" name="class" value="<?php echo $row['class']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" class="form-control" id="course" name="course" value="<?php echo $row['course']; ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
