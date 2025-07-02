<?php 

class Main {
    public function __construct() {
        $this->require_file();
        Helper::header();
        $this->view();
        Helper::footer();
    }

    public function require_file()
    {
        require_once './helper.php';
        require_once './config.php';
    }

    public function view()
    {
        $this->table_header();
        $this->table_body();
    }
    
    public function table_header()
    {
        ?>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Product List</h1>
                <div class="actions-button">
                    <a href="create.php" class="btn btn-primary">+ Add New Product</a>
                    <a href="category.php" class="btn btn-info">+ Category</a>
                </div>
            </div>
        <?php 
    }

    public function table_body() 
    {
        // Fetch all products from the database
        $products = Config::get_all_products(); // You need to implement this method in your Config class

        ?>
            <table class="table table-hover table-bordered bg-white shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $row): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['name']) ?></td>
                                <td><?php echo htmlspecialchars($row['category_name']) ?></td>
                                <td><?php echo htmlspecialchars($row['price']) ?></td>
                                <td>
                                    <?php if (!empty($row['image'])): ?>
                                        <img src="uploads/<?php echo htmlspecialchars($row['image']) ?>" alt="Product Image" width="60">
                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($row['description']) ?></td>
                                <td>
                                    <a href="view.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-info">View</a>
                                    <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No products found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        <?php 
    }

}

new Main();