<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Doctor Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      padding: 40px;
    }
    .table-container {
      background: white;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }
    .doctor-img {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      object-fit: cover;
    }
    .btn-edit {
      background-color: #0d6efd;
      color: white;
    }
    .btn-delete {
      background-color: #dc3545;
      color: white;
    }
  </style>
</head>
<body>
 
<div class="container table-container">
  <div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h2>📋 Doctor Management</h2>
        <div>
            <a href="add.php" class="btn btn-success">👩🏻‍🔬 Add Doctor</a>
            <a href="delete.php" class="btn btn-danger">👩🏻‍🔬 Delete Doctor</a>
        </div>
    </div>
  <div class="table-responsive">
    <table class="table align-middle table-hover">
      <thead class="table-light">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Photo</th>
          <th scope="col">Name</th>
          <th scope="col">Specialization</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Availability</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
         <?php 
        $sql = "SELECT * FROM dm";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><img src="https://randomuser.me/api/portraits/men/10.jpg" class="doctor-img" alt="Doctor Photo"></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['specialization'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['phone'] ?></td>
          <td><span class="badge bg-success"><?= $row['availability'] ?></span></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-edit me-1">Edit</a>
            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">🗑️ Delete</a>
          </td>
        </tr>
        <!-- Add more rows as needed -->
      </tbody>
        <?php endwhile; ?>
    </table>
  </div>
</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 