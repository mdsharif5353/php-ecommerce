<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

include '../includes/db_config.php'; // Include your database configuration file

// Fetch categories from the database
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

?>

<?php require 'layout.php'; ?>

<div>
    <div class=" bg-dark text-light rounded p-2 d-flex align-items-center justify-content-between">
        <h4>Categories</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProduct"><i class="bi bi-plus-circle"></i>
            Add Categories
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="add.php" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-dark">Add Categories</h4>

                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text">name</span>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text">Image </label>
                                <input class="form-control" type="file" class="form-control" name="image" accept=".jpg,.png, .svg">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancle</button>
                            <button type="submit" class="btn btn-success" class="addproduct">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- categories list  -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row["category_id"] . "</th>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td><img src='../assets/images/" . basename($row["image"]) . "' width='100' height='100'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No categories found</td></tr>";
            }
            ?>

        </tbody>
    </table>
   
</div>

<?php require 'admin_footer.php'; ?>
<?php
// Close the database connection
$conn->close();
?>