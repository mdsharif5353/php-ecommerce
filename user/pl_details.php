<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- custom css  -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class=" bg-body-tertiary">
    <div class="navbg">
        <div class="container mx-auto d-flex justify-content-between align-items-center w-100 border-bottom border-dark-subtle border-opacity-10">
            <div class="d-flex" style="font-size: 13px;">
                <p class="text-white">Hotline: <span class="text-danger">0123456789</span></p>
            </div>
            <!-- Join Us and Sign In Links -->
            <div class="d-flex gap-2" style="font-size: 13px;">
                <p class="text-light">Store Locations</p>
                <p class="text-light">Check Your Order</p>
                <div class="d-flex gap-2 mt-1">
                    <i class="fa-brands fa-facebook" style="color: #ffffff;"></i>
                    <i class="fa-brands fa-instagram" style="color: #ffffff;"></i>
                    <i class="fa-brands fa-youtube" style="color: #ffffff;"></i>
                </div>
            </div>
        </div>
        <span class="border-bottom border-secondary-subtle"></span>
        <!-- navbar -->
        <nav class="container navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand text-white fs-2" href="index.php">EchoTech</a>
                <div class="input-group w-50 text-center">
                    <input type="text" class="form-control" placeholder="Search products" aria-label="Search products" aria-describedby="button-addon2">
                    <button class="btn btn-outline-danger" type="button" id="button-addon2">Search</button>
                </div>
                <div class="d-none d-sm-block">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Offer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Cart <span class="badge bg-danger cart-badge">0</span></a>
                        </li>

                    </ul>
                </div>

            </div>
        </nav>
    </div>

    <?php
    include '../includes/db_config.php';

    if (isset($_GET['product_id'])) {
        // Get  product ID from  URL
        $product_id = $_GET['product_id'];

        // product details based on the product ID
        $sql = "SELECT * FROM products WHERE product_code = '$product_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
    ?>
            <div class="container my-4">
                <div class="row ">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card shadow-sm " style="height: 400px">
                            <div class="card-body">
                                <div class="image-container d-flex align-items-center justify-content-center "">
                                <img src=" ../assets/images/<?php echo basename($product['image']); ?>" alt="Product Image" class="mw-50 mh-100" style="min-width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card shadow-sm " style="height: 400px">
                            <div class="card-body">
                                <h3><?php echo $product['name']; ?></h3>
                                <div class="container d-flex align-items mt-2 gap-2">
                                    <div id="stars" class="">
                                        <span class="stars" data-value="1">&#9733;</span>
                                        <span class="stars" data-value="2">&#9733;</span>
                                        <span class="stars" data-value="3">&#9733;</span>
                                        <span class="stars" data-value="4">&#9733;</span>
                                        <span class="stars" data-value="5">&#9733;</span>
                                    </div>
                                    <p>Reviews</p>
                                </div>
                                <p>Status: <?php echo $product['status']; ?></p>
                                <p>Brand: <?php echo $product['brand']; ?></p>
                                <p>Feature: <?php echo $product['feature']; ?></p>
                                <p>Product Code: <?php echo $product['product_code']; ?></p>
                                <p>Price: <?php echo $product['price']; ?></p>

                                <div class="row g-3">
                                    <div class="col">
                                        <input type="number" class="form-control" id="cart_quantity" name="cart_quantity" value="1" min="1" max="10">
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-danger ">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="container">

            <div class="container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Review</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="card shadow-sm " style="height: 400px">
                            <div class="card-body">
                                <p>Description: <?php echo $product['long_desc']; ?></p>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
                </div>

            </div>

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

    <!-- Add to cart functionality -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Add to cart functionality -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addToCartBtn = document.querySelector('.btn.btn-danger');
        if (addToCartBtn) {
            addToCartBtn.addEventListener('click', addToCart);
        }

        function addToCart() {
            // AJAX request to add product to cart
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // On success, show alert and update cart badge
                        alert('Product added to cart');
                        updateCartBadge(xhr.responseText);
                    } else {
                        alert('Error: ' + xhr.status);
                    }
                }
            };
            xhr.open('POST', 'addToCart.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('product_id=<?php echo $product_id; ?>');
        }

        function updateCartBadge(quantity) {
            const cartBadge = document.querySelector('.cart-badge');
            if (cartBadge) {
                cartBadge.textContent = quantity;
            }
        }
    });
</script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const stars = document.querySelectorAll('.stars');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const value = parseInt(this.getAttribute('data-value'));
                    updateRating(value);
                });
            });

            function updateRating(value) {
                stars.forEach(star => {
                    const starValue = parseInt(star.getAttribute('data-value'));
                    if (starValue <= value) {
                        star.classList.add('text-warning');
                    } else {
                        star.classList.remove('text-warning');
                    }
                });
            }
        });
    </script>