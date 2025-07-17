<?php 
include 'config.php';
$sql = "SELECT * FROM `specialization`";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h2>👩🏻‍🔬 Add A Specialization</h2>
    <form action="add.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="name" class="form-label">Specialization</label>
        <input type="text" class="form-control" id="name" name="specialization" required>
      </div>
      <button type="submit" class="btn btn-primary">Add Specialization</button>
      <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>