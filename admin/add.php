<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

// Database connection
// Replace these credentials with your database connection details
include '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_FILES['image'])) {
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];

    $target = "../assets/images/" . basename($image);

    move_uploaded_file($tempImage, $target);

    $sql = "INSERT INTO categories (name, image) VALUES ('$name', '$image')";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

