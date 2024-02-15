<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

// Database connection
include '../includes/db_config.php'; // Replace with your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_FILES['image'])) {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $brand = $_POST['brand'];
    $feature = $_POST['feature'];
    $short_desc = $_POST['short_desc'];
    $long_desc = $_POST['long_desc'];
    $product_code = $_POST['product_code'];
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];

    $target = "../assets/images/" . basename($image); 
    
    move_uploaded_file($tempImage, $target);

    // Use prepared statement to avoid SQL injection
    $sql = $conn->prepare("INSERT INTO products (name, category_id, image, price, status, brand, feature, short_desc, long_desc, product_code)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $sql->bind_param("sissssssss", $name, $category_id, $image, $price, $status, $brand, $feature, $short_desc, $long_desc, $product_code);

    if ($sql->execute()) {
        header("Location: admin_dashboard.php"); // Redirect to your desired page after successful insertion
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
    $conn->close();
}
?>


