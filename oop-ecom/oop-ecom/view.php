<?php
require_once './helper.php';
require_once './config.php';

Helper::header();

$id = $_GET['id'] ?? null;
if (!$id) {
    echo '<div class="alert alert-danger">No product selected.</div>';
    Helper::footer();
    exit;
}
$product = Config::get_single_product($id);
if (!$product) {
    echo '<div class="alert alert-danger">Product not found.</div>';
    Helper::footer();
    exit;
}
?>
<h2 class="mb-4">Product Details</h2>
<div class="card mb-4">
    <div class="row g-0">
        <div class="col-md-4">
            <?php if (!empty($product['image'])): ?>
                <img src="uploads/<?php echo htmlspecialchars($product['image']) ?>" class="img-fluid rounded-start" alt="Product Image">
            <?php else: ?>
                <span class="text-muted">No image</span>
            <?php endif; ?>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($product['name']) ?></h5>
                <p class="card-text"><strong>Category:</strong> <?php echo htmlspecialchars($product['category_name']) ?></p>
                <p class="card-text"><strong>Price:</strong> $<?php echo htmlspecialchars($product['price']) ?></p>
                <p class="card-text"><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($product['description'])) ?></p>
                <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                <a href="index.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
<?php
Helper::footer();
