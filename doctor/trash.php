<?php 
include 'config.php';
    $sql = "SELECT dm.*, availability.availability AS availability FROM dm JOIN availability ON dm.availability = availability.id WHERE status != '1'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);     
    }
    else {
        $data = [];
    }
?>

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
      width: 50px;
      height: 50px;
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
            <a href="index.php" class="btn btn-info">👩🏻‍🔬 See All Doctor</a>
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
        if (count($data) > 0) {
          // Loop through the data and display each row
          foreach ($data as $row) : ?>
            <tr>
          <td><?= $row['id'] ?></td>
          <td><img src="<?= $row['photo'] ?>" class="doctor-img" alt="Doctor Photo"></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['specialization'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['phone'] ?></td>
          <?php 
          $availability = $row['availability'];
          $baseclass = '';
          switch ($availability) {
            case 'Available':
              $baseclass = 'bg-success';
              break;
              case 'On Leave':
                $baseclass = 'bg-danger';
          }
          ?>
          <td><span class="badge <?= $baseclass ?>"><?= $row['availability'] ?></span></td>
          <td>
            <a href="restore.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-edit me-1">Restore</a>
            <a href="delforever.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">🗑️ Delete</a>
          </td>
        </tr>
          <?php endforeach; ?>
          <?php
        }else{
          echo "0 results";
        } 
        ?>
        
        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>
</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 