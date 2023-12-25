<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

include '../includes/db_config.php';

// Pagination settings
$results_per_page = 5; // Number of categories per page

// Determine the total number of categories
$sql = "SELECT COUNT(*) AS total FROM categories";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_categories = $row['total'];

// Determine the total number of pages
$total_pages = ceil($total_categories / $results_per_page);

// Check the current page number from the URL
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

// Calculate the SQL LIMIT starting row number for the query
$offset = ($page - 1) * $results_per_page;

// Fetch categories for the current page
$sql = "SELECT * FROM categories LIMIT $offset, $results_per_page";
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
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row["category_id"] . "</th>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td><img src='../assets/images/" . basename($row["image"]) . "' width='60' height='60'></td>";
                    echo "<td>
                            <form action='delete_category.php' method='post'>
                                <input type='hidden' name='category_id' value='" . $row["category_id"] . "'>
                                <button type='submit' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this category?\")'>
                                    <i class='fa-regular fa-trash-can'></i> 
                                </button>
                            </form>
                          <a href='edit_category.php?category_id=" . $row["category_id"] . "' class='btn btn-primary'>
                            <i class='fa-regular fa-pen-to-square'></i> 
                          </a>
                        </td>";
                    echo "</tr>";
                    
                }
            } else {
                echo "<tr><td colspan='5'>No categories found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?php echo ($page <= 1) ? 1 : ($page - 1); ?>">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?php echo ($page >= $total_pages) ? $total_pages : ($page + 1); ?>">Next</a>
            </li>
        </ul>
    </nav>

</div>

<?php require 'admin_footer.php'; ?>
<?php
// Close the database connection
$conn->close();
?>