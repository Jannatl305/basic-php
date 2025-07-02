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
$categories = Config::get_categories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $description = htmlspecialchars(strip_tags(trim($_POST['description'])));
    $price = htmlspecialchars(strip_tags(trim($_POST['price'])));
    $category_id = htmlspecialchars(strip_tags(trim($_POST['category'])));
    $image = $product['image'];
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES['image']['name']);
        $targetFile = $targetDir . $fileName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check !== false && in_array($imageFileType, $allowedTypes) && $_FILES['image']['size'] <= 5 * 1024 * 1024) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $image = $fileName;
            }
        }
    }
    Config::update_product($id, $name, $description, $price, $category_id, $image);
    exit;
}
?>
<h2 class="mb-4">Edit Product</h2>
<form method="post" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($product['name']) ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Category</label>
            <select class="form-select" name="category" required>
                <?php foreach($categories as $cat): ?>
                    <option value="<?php echo $cat['id'] ?>" <?php if($cat['id'] == $product['category_id']) echo 'selected'; ?>><?php echo $cat['category_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="<?php echo htmlspecialchars($product['price']) ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            <?php if (!empty($product['image'])): ?>
                <img src="uploads/<?php echo htmlspecialchars($product['image']) ?>" alt="Product Image" width="60" class="mt-2">
            <?php endif; ?>
        </div>
        <div class="col-md-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"><?php echo htmlspecialchars($product['description']) ?></textarea>
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-success">Update Product</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </div>
</form>
<?php
Helper::footer();
