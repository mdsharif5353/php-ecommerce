<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    // Assuming you have a session variable to store cart items
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add product to cart
    $product_id = $_POST['product_id'];
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = 0;
    }
    $_SESSION['cart'][$product_id]++;

    // Update cart badge with total quantity
    $totalQuantity = array_sum($_SESSION['cart']);
    echo $totalQuantity;
} else {
    // Handle invalid request
    http_response_code(400);
    echo "Bad Request";
}
?>
