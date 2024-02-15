<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/db_config.php';

// Check if product id
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch product details
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

?>
        <?php require 'layout.php'; ?>

        <div class="modal-dialog">
            <form action="update_product.php" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-dark">Edit Product</h4>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Image</label>
                            <input class="form-control" type="file" name="image" accept=".jpg, .png, .svg">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="text" class="form-control" name="price" value="<?php echo $row['price']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Status</span>
                            <input type="text" class="form-control" name="status" value="<?php echo $row['status']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Brand</span>
                            <input type="text" class="form-control" name="brand" value="<?php echo $row['brand']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Feature</span>
                            <input type="text" class="form-control" name="feature" value="<?php echo $row['feature']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Short Description</span>
                            <input type="text" class="form-control" name="short_desc" value="<?php echo $row['short_desc']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Long Description</span>
                            <textarea class="form-control" name="long_desc" rows="3"><?php echo $row['long_desc']; ?></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Product Code</span>
                            <input type="text" class="form-control" name="product_code" value="<?php echo $row['product_code']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" name="edit">Edit</button>
                    </div>
                </div>
            </form>
        </div>

<?php
    } else {
        echo "Product not found!";
    }
} else {
    echo "Invalid request!";
}
?>