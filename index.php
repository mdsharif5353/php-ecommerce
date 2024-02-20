<?php require 'includes/header.php'; ?>
<?php require 'includes/navbar.php'; ?>
<?php require 'includes/slider.php'; ?>

<?php
include 'includes/db_config.php';

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
$laptop_category_id = 24;
$sql_products = "SELECT * FROM products WHERE category_id = $laptop_category_id";
$result_products = $conn->query($sql_products);

?>

<div class=" container mt-4 mb-4">
    <h3 class="mb-4">Shop By Category</h3>
    <?php
    if ($result->num_rows > 0) {
        echo '<div class="container text-center">';
        echo '<div class="mt-2 row row-cols-2 row-cols-sm-3 row-cols-md-5 ">';

        while ($row = $result->fetch_assoc()) {
            echo '<div class="col border border-secondary-subtle d-flex flex-column shadow-sm bg-white">';
            echo '<div class="d-flex justify-content-between p-2">';
            echo '<p>' . $row["name"] . '</p>';
            echo '<img src="assets/images/' . basename($row["image"]) . '" width="50" height="50">';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
    } else {
        echo '<p>No categories found</p>';
    }
    ?>

    <h3 class="mb-4 mt-4">Laptop Products</h3>
    <?php
    if ($result_products->num_rows > 0) {
        echo '<div class="row row-cols-1 row-cols-md-4 g-1">';
        while ($row_product = $result_products->fetch_assoc()) {
            echo '<div class="col">';
            echo '<div class="card h-100 shadow-sm ">';
            echo '<div class="image-container d-flex align-items-center justify-content-center">';
            echo '<img src="assets/images/' . basename($row_product["image"]) . '" class="card-img-top w-75 zoom-image" alt="Product Image">';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<p class="card-title">' . $row_product["name"] . '</p>';
            echo '<h5 class="card-text">Price: ৳' . $row_product["price"] . '</h5>';
            echo '<div class="d-grid gap-2 mx-auto">
            <button class=" btn buyBtn" style="background-color:#EF3921;" >Buy Now</button>
            </div>';
            echo '<div class="text-center">';
            echo '<a href="./user/pl_details.php?product_id=' . $row_product["product_code"] . '" class="btn btn-light" style="color:#EF3921; display: inline-block;">View Details</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No products found in the "laptop" category</p>';
    }
    ?>

</div>

<?php require 'includes/footer.php'; ?>