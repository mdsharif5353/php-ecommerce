<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $brand = $_POST['brand'];
    $feature = $_POST['feature'];
    $short_desc = $_POST['short_desc'];
    $long_desc = $_POST['long_desc'];
    $product_code = $_POST['product_code'];

    // Check if an image file is uploaded
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $tempImage = $_FILES['image']['tmp_name'];
        $target = "../assets/images/" . basename($image);

        move_uploaded_file($tempImage, $target);

        // Update image and other details
        $sql = "UPDATE products SET name = '$name', image = '$image', price = '$price', status = '$status', brand = '$brand', feature = '$feature', short_desc = '$short_desc', long_desc = '$long_desc', product_code = '$product_code' WHERE id = $id";
    } else {
        // Update product details excluding image
        $sql = "UPDATE products SET name = '$name', price = '$price', status = '$status', brand = '$brand', feature = '$feature', short_desc = '$short_desc', long_desc = '$long_desc', product_code = '$product_code' WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: product.php");
        exit();
    } else {
        echo "Error updating product: " . $conn->error;
    }
}

$conn->close();
?>
