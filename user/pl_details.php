<?php require '../includes/header.php'; ?>
<?php require '../includes/navbar.php'; ?>

<?php
include '../includes/db_config.php';

if(isset($_GET['product_id'])) {
    // Get  product ID from  URL
    $product_id = $_GET['product_id'];
    
    // product details based on the product ID
    $sql = "SELECT * FROM products WHERE product_code = '$product_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
?>
        <div class="container">
            <h3><?php echo $product['name']; ?></h3>
            <img src="../assets/images/<?php echo basename($product['image']); ?>" alt="Product Image" style="max-width: 300px;">
            <p>Status: <?php echo $product['status']; ?></p>
            <p>Brand: <?php echo $product['brand']; ?></p>
            <p>Feature: <?php echo $product['feature']; ?></p>
            <p>Short Description: <?php echo $product['short_desc']; ?></p>
            <p>Long Description: <?php echo $product['long_desc']; ?></p>
            <p>Product Code: <?php echo $product['product_code']; ?></p>
        </div>
<?php
    } else {
        echo '<p>No product found</p>';
    }
} else {
    echo '<p>No product ID specified</p>';
}

require '../includes/footer.php';
?>
