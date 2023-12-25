<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];

    // Check if a new image file is uploaded
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $tempImage = $_FILES['image']['tmp_name'];

        $target = "../assets/images/" . basename($image);

        move_uploaded_file($tempImage, $target);

        // Update category details including image
        $sql = "UPDATE categories SET name = '$name', image = '$image' WHERE category_id = $category_id";
    } else {
        // Update category details excluding image
        $sql = "UPDATE categories SET name = '$name' WHERE category_id = $category_id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: category.php");
        exit();
    } else {
        echo "Error updating category: " . $conn->error;
    }
}

$conn->close();
?>
