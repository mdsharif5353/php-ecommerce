<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/db_config.php';

// Check if category_id is set in the URL query parameters
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    // Fetch category details based on the category_id
    $sql = "SELECT * FROM categories WHERE category_id = $category_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display form to edit category details
        ?>

        <?php require 'layout.php'; ?>

        <div class="modal-dialog">
            <form action="update_category.php" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-dark">Edit Category</h4>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text">Image</label>
                            <input class="form-control" type="file" name="image" accept=".jpg, .png, .svg">
                            <input type="hidden" name="category_id" value="<?php echo $row['category_id']; ?>">
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
        echo "Category not found!";
    }
} else {
    echo "Invalid request!";
}
?>

