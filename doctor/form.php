<?php 
include 'config.php';
$sql = "SELECT * FROM `availability`, `specialization` WHERE 1";
$result = $conn->query($sql);
?>

<div class="container mt-5">
  <div class="d-flex justify-content-between mb-3">
    <h2>👩🏻‍🔬 Add A Doctor</h2>
    <a href="addspecialization.php" class="btn btn-warning">👩🏻‍🔬 Add Specialization</a>
  </div>
    <form action="add.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="specialization" class="form-label">Specialization</label>
        <select class="form-select" id="specialization" name="specialization" required>
          <?php foreach ( $result as $row): ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['specialization']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
      </div>
      <div class="mb-3">
        <label for="availability" class="form-label">Availability</label>
        <select class="form-select" id="availability" name="availability" required>
          <?php foreach ( $result as $row): ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['availability']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="photo" class="form-label">Image</label>
        <input type="file" class="form-control" id="photo" name="photo">
      </div>
      <button type="submit" class="btn btn-primary">Add Doctor</button>
      <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>