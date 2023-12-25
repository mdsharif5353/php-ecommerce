<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];

    //  deletion query
    $sql = "DELETE FROM categories WHERE category_id = $category_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: category.php"); 
    } else {
        echo "Error deleting category: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request!";
}
?>
