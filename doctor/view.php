<?php 
include "config.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM dm WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }else {
        echo "No doctor found.";
        exit;
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Details</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <h1 class="text-center mb-4">Doctor Details</h1>

        <div class="card shadow-lg">
            <div class="row g-0">
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-primary text-white p-4">
                        <img src ="<?= $row['photo']; ?>" alt="Doctor Photo" style="width: 100%;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
                        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                        <p><strong>Specialization:</strong> <?php echo $row['specialization']; ?></p>
                        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                        <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
                        <p><strong>Availability:</strong> <?php echo $row['availability']; ?></p>

                        <a href="index.php" class="btn btn-outline-primary mt-3">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
