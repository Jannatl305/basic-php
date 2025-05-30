<div class="container mt-5">
    <h2>👩🏻‍🔬 Add A Doctor</h2>
    <form action="add.php" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="specialization" class="form-label">Specialization</label>
        <input type="text" class="form-control" id="specialization" name="specialization" required>
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
        <input type="text" class="form-control" id="availability" name="availability" required>
      </div>
      <button type="submit" class="btn btn-primary">Add Doctor</button>
    </form>
  </div>