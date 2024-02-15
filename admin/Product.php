<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/db_config.php';
?>

<?php require 'layout.php'; ?>
<div>
    <div class=" bg-dark text-light rounded p-2 d-flex align-items-center justify-content-between">
        <h4>Product</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProduct"><i class="bi bi-plus-circle"></i>
            Add Product
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="add_product.php" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-dark">Add Product</h4>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Name</span>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text">Category</label>
                                <select class="form-select" name="category_id">
                                    <?php
                                    include '../includes/db_config.php';
                                    $sql = "SELECT category_id, name FROM categories";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row['category_id'] . '">' . $row['name'] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">No categories found</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text">Image</label>
                                <input class="form-control" type="file" name="image" accept=".jpg,.png,.svg">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Price</span>
                                <input type="text" class="form-control" name="price">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Status</span>
                                <input type="text" class="form-control" name="status">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Brand</span>
                                <input type="text" class="form-control" name="brand">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Feature</span>
                                <input type="text" class="form-control" name="feature">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Short Description</span>
                                <input type="text" class="form-control" name="short_desc">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Long Description</span>
                                <textarea class="form-control" name="long_desc" rows="3"></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Product Code</span>
                                <input type="text" class="form-control" name="product_code">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" name="add_product">Add</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- products list  -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Brand</th>
                <th scope="col">Feature</th>
                <th scope="col">Short Description</th>
                <th scope="col">Long Description</th>
                <th scope="col">P_Code</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../includes/db_config.php';
            // Fetch products data from the database
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            // Display products in table
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['category_id'] . '</td>';
                    echo "<td><img src='../assets/images/" . basename($row["image"]) . "' width='60' height='60'></td>";
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>' . $row['status'] . '</td>';
                    echo '<td>' . $row['brand'] . '</td>';
                    // echo '<td>' . $row['feature'] . '</td>';
                    // echo '<td>' . $row['short_desc'] . '</td>';
                    // echo '<td>' . $row['long_desc'] . '</td>';
                    echo '<td>' . limits($row['feature'], 5) . '</td>';
                    echo '<td>' . limits($row['short_desc'], 5) . '</td>';
                    echo '<td>' . limits($row['long_desc'], 5) . '</td>';
                    echo '<td>' . $row['product_code'] . '</td>';
                    echo "<td>
                    <form action='delete_product.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <button type='submit' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this product?\")'>
                            <i class='fa-regular fa-trash-can'></i> 
                        </button>
                    </form>
                  <a href='edit_product.php?id=" . $row["id"] . "' class='btn btn-primary'>
                    <i class='fa-regular fa-pen-to-square'></i> 
                  </a>
                </td>";
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="11">No products found</td></tr>';
            }
            // function to limit words
            function limits($string, $word_limit)
            {
                $words = explode(" ", $string);
                return implode(" ", array_splice($words, 0, $word_limit)) . (count($words) > $word_limit ? '...' : '');
            }
            ?>
        </tbody>
    </table>

</div>

<?php require 'admin_footer.php'; ?>
<?php
$conn->close();
?>