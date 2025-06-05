<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM dm WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No doctor found.";
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
    <h2 class="mb-4">Edit Doctor Information</h2>
    <form action="update.php" method="POST" class="border p-4 rounded bg-light" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="specialization" class="form-label">Specialization</label>
        <input type="text" class="form-control" id="specialization" name="specialization" value="<?php echo $row['specialization']; ?>" required>
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
        <label for="availability" class="form-label">Availability</label>
        <input type="text" class="form-control" id="availability" name="availability" value="<?php echo $row['availability']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="photo" class="form-label">Image</label>
        <input type="file" class="form-control" id="photo" name="photo" >
        <?php if (!empty($row['photo'])): ?>
        <small class="text-muted">Previously selected file: <?php echo $row['photo']; ?></small>
        <?php endif; ?>
    <!-- keep old photo name for update.php -->
    <input type="hidden" name="old_photo" value="<?php echo $row['photo']; ?>">
      </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>