<?php
session_start();

if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $product_id => $quantity){
        // Fetch product details from database based on $product_id and display them
        echo "<p>Product ID: $product_id, Quantity: $quantity</p>";
    }
}else{
    echo "<p>No items in cart</p>";
}
?>
